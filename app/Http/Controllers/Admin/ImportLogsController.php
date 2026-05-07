<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportDraft;
use App\Models\ImportLog;
use App\QueryBuilders\ImportLogsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class ImportLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ImportLogsQueryBuilder $importLogsQueryBuilder):View
    {
        // $query = ImportLog::query();
        // $query->when($request->search, function ($q, $search) {
        //     return $q->where('filename', 'LIKE', "%{$search}%")
        //             ->orWhere('id', $search);
        // });        
        return view('admin.importlogs.index', [
            'importLogsList' => $importLogsQueryBuilder->getImportLogsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lastLog = null;
        $importDrafts = collect();

        if (session('last_id')) {
            $lastLog = ImportLog::find(session('last_id'));
            if ($lastLog && is_array($lastLog->processed_ids) ) {
                $importDrafts = ImportDraft::whereIn('id', $lastLog->processed_ids)->get();
            }
        }
        return view('admin.importlogs.create', compact('lastLog', 'importDrafts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $files = $request->allFiles(); 

        if (empty($files)) {
            return back()->with('error', 'No files');
        }

        $file = reset($files);

        if ($file->getClientOriginalExtension() !== 'csv') {
            return back()->with('error', 'It needed only csv files');
        }

        //////////
        
        $fileName = $file->getClientOriginalName();

        // get meta-data before the cycle
        $targetTable = (new ImportDraft())->getTable(); // get table name
        $userId = auth()->id();  // Auth::id();   // get user id

        $fileStream = fopen($file->getRealPath(), 'r');
        $firstLine = fgets($fileStream);
        $separator = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';':',';
        rewind($fileStream);
        fgetcsv($fileStream, 0, $separator);   // heading missing

        // Counters for total log
        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        $ids = [];

        LazyCollection::make(function () use ($fileStream, $separator) {
            while (($row = fgetcsv($fileStream, 0, $separator)) !== false) {
                yield $row;
            }
        })->each(function ($row) use (&$ids, &$successCount, &$errorCount, &$errors) {   
            if (empty($row) || count($row) < 2) return;

            try {
                // import logic
                $importDraft = ImportDraft::updateOrCreate([
                    'id' => $row[0],
                    'pattern_id' => $row[1],
                    'word_id' => $row[2],
                    'translation' => $row[3],
                    'spell_base' => $row[4],
                    'spell_eng' => $row[5],
                    'status' => $row[6],
                ]);

                $ids[] = $importDraft->id;

                $successCount++;

            } catch (\Exception $e) {

                $errorCount++;

                if (count($errors) < 3) {
                    $errors[] = "String " . ($successCount + $errorCount +1) . ": " . $e->getMessage();
                }
            }
        });

        fclose($fileStream);

        ////
        $log = ImportLog::create([
            'user_id' => $userId,
            'tablename' => $targetTable,
            'filename' => $fileName,
            'rows_processed' => $successCount + $errorCount, // $row,
            'status' => ($errorCount === 0) ? 'success' : 'error',    //  $status,
            'message' => "Success: $successCount, Errors: $errorCount. " . implode('; ', $errors),   //  $message,
            'processed_ids' => $ids,
        ]);
        ////
        return \redirect()->route('admin.importlogs.create')
                ->with('last_id', $log->id)
                ->with('success', 'Import completed. Rows processed: ' . ($successCount + $errorCount)); //  
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)  //(ImportLog $importLog, ImportDraft $importDrafts): View  //(int $id)        //(ImportLog $importLog)
    {
        //$ids = is_array($importLog->processed_ids) ? $importLog->processed_ids : json_decode($importLog->processed_ids, true);
        //$ids = $importLog->processed_ids;
        // if (is_string($ids)) {
        //     $ids = json_decode($ids, true);
        // }
        // if (!is_array($ids)) {
        //     $ids = [];
        //}
        
        //$importLog = ImportLog::findOrFail($id);
        //$ids = array_map('intval', (array)$ids);
        //$importLog->getAttributes()['processed_ids'];
        //dd(DB::table('import_drafts')->count());
        //dd($ids);
        $importLog = ImportLog::findOrFail($id);
        //dd(array_keys($importLog->getAttributes()));
        $raw = $importLog->getAttributes()['processed_ids'] ?? null;
        $ids = is_string($raw) ? json_decode($raw, true) : $raw;
        if (!is_array($ids)) {
            $ids = [];
        }
        //$ids - array_map('intval', $ids)
        //$importDrafts = ImportDraft::whereIn('id', $ids ?? [])->get();
        $importDrafts = ImportDraft::whereIn('id', $ids)->get();
        //dd($importDrafts);
        //$importDrafts = collect();

        // if (is_array($importLog->processed_ids)) {
        //     $importDrafts = ImportDraft::whereIn('id', $importLog->processed_ids)->get();
        // }
        //dd($importLog->processed_ids);
        //dd($importLog->getRawOriginal());

        //return view('admin.importlogs.show', compact('importLog', 'importDrafts'));
        return view('admin.importlogs.show', [
            'importLog' => $importLog,
            'importDrafts' => $importDrafts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $importLog = ImportLog::find($id);
        if (!$importLog) {
            return response()->json(['ok' => false, 'message' => "Record not found"], 404);
        }
        $importLog->delete();
        return response()->json(['ok' => true]);
    }

    // public function destroy(ImportLog $importLog)
    // {
    //     try {
    //         $importLog->delete();

    //         return \response()->json('ok');
    //     } catch (\Exception $exception) {
    //         //\Log::error($exception->getMessage(), [$exception]);

    //         return \response()->json('error', 400);
    //     }
    // }
}

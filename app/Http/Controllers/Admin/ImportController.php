<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportDraft;
use App\Models\ImportLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\LazyCollection;

class ImportController extends Controller
{
    public function import(Request $request)
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
        $userId = auth()->id();  // get user id

        $fileStream = fopen($file->getRealPath(), 'r');
        $firstLine = fgets($fileStream);
        $separator = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';':',';
        rewind($fileStream);
        fgetcsv($fileStream, 0, $separator);   // heading missing

        // Counters for total log
        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        LazyCollection::make(function () use ($fileStream, $separator) {
            while (($row = fgetcsv($fileStream, 0, $separator)) !== false) {
                yield $row;
            }
        })->each(function ($row) use (&$successCount, &$errorCount, &$errors) {   
            if (empty($row) || count($row) < 2) return;            

            try {
                ImportDraft::updateOrCreate([
                    'id' => $row[0],
                    'pattern_id' => $row[1],
                    'word_id' => $row[2],
                    'translation' => $row[3],
                    'spell_base' => $row[4],
                    'spell_eng' => $row[5],
                    'status' => $row[6],
                ]);

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
            'rows_processed' => $successCount + $errorCount, 
            'status' => ($errorCount === 0) ? 'success' : 'error',   
            'message' => "Success: $successCount, Errors: $errorCount. " . implode('; ', $errors),   
        ]);
        ////
        return \redirect()->route('admin.importlogs.index')
                ->with('last_import_id', $log->id)
                ->with('success', 'Import completed. Rows processed: ' . ($successCount + $errorCount)); 
        
    }

    public function logResult($userId, $tableName, $fileName, $row, $status, $message = null)
    {
        ImportLog::create([
            'user_id' => $userId,
            'tablename' => $tableName,
            'filename' => $fileName,
            'row_number' => $row,
            'status' => $status,
            'message' => $message,
        ]);
    }
}

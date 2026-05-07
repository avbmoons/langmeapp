<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportDraft;
use App\Models\ImportLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\LazyCollection;

class working_ImportController extends Controller
{
    // public function upload(Request $request)
    public function import(Request $request)
    {
        // $request->validate([
        //     'csv_file' => 'required|file|mimes:csv,txt',
        // ]);        
        //dd(auth()->id());

        $files = $request->allFiles();  //$file = file('csv_file');

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

        //$rowNumber = 1;
        
        //$firstLine = fgets($fileStream);
        //$separator = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';':',';

        //rewind($fileStream);

        // Counters for total log
        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        LazyCollection::make(function () use ($fileStream, $separator) {
            while (($row = fgetcsv($fileStream, 0, $separator)) !== false) {
                yield $row;
            }
        })->each(function ($row) use (&$successCount, &$errorCount, &$errors) {   // use ($errorCount, $errors, &$rowNumber, $fileName, $successCount, $targetTable, $userId) {
            // if (empty($row) || !isset($row[0])) {
            //     return;
            // }
            // $rowNumber++;
            if (empty($row) || count($row) < 2) return;

            // if (count($row) < 9) {
            //     if (str_contains($row[0], ';')) {
            //         $row = str_getcsv($row[0], ';');
            //     }

            //     if (count($row) < 9) {
            //         $this->logResult($userId, $targetTable, $fileName, $rowNumber, 'error', 'Error count collumns ' . count($row));
            //         return;
            //     }
            // }

            try {
                // import logic
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

                // // write the success log
                // $this->logResult($userId, $targetTable, $fileName, $rowNumber, 'success');
            } catch (\Exception $e) {

                $errorCount++;

                if (count($errors) < 3) {
                    $errors[] = "String " . ($successCount + $errorCount +1) . ": " . $e->getMessage();
                }

                // // write the error log
                // $this->logResult($userId, $targetTable, $fileName, $rowNumber, 'error', $e->getMessage());
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
        ]);
        ////
        return \redirect()->route('admin.importlogs.create')
                ->with('last_import_id', $log->id)
                ->with('success', 'Import completed. Rows processed: ' . ($successCount + $errorCount)); //  ->with('success', 'Import completed');

        // $log = ImportLog::create([
        //     'filename' => $filename,
        //     'status' => 'pending',
        //     'user_id' => auth()->id(),
        // ]);

        // try {
        //     // csv parsing logic
        //     $rowCount = 0;
        //     $this->importCsv($file);

        //     $log->update([
        //         'status' => 'success',
        //         'rows_processed' => $rowCount,
        //         'message' => 'Import finished with success',
        //     ]);
        // } catch (\Exception $e) {
        //     $log->update([
        //         'status' => 'error',
        //         'message' => $e->getMessage()
        //     ]);
        // }
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

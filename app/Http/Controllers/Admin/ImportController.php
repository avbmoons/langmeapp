<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportLog;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('csv_file');
        $filename = $file->getClientOriginalName();

        $log = ImportLog::create([
            'filename' => $filename,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        try {
            // csv parsing logic
            $rowCount = 0;
            $this->importCsv($file);

            $log->update([
                'status' => 'success',
                'rows_processed' => $rowCount,
                'message' => 'Import finished with success',
            ]);
        } catch (\Exception $e) {
            $log->update([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}

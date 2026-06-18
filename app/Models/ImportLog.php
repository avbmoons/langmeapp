<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ImportLog extends Model
{
    use HasFactory;

    protected $table = 'import_logs';

    protected $fillable = [
        'id',
        'filename',
        'tablename',
        'rows_processed',
        'status',
        'message',
        'user_id',
        'processed_ids',
    ];

    protected $casts = [
        'processed_ids' => 'json',     //  'array',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getImportLogs():Collection
    {
        return DB::table($this->table)->get();
    }
}

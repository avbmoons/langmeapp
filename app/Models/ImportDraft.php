<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDraft extends Model
{
    use HasFactory;

    protected $table = 'import_drafts';

    protected $fillable = [
        'id',
        'pattern_id',
        'word_id',
        'translation',
        'spell_base',
        'spell_eng',
        'status',
    ];

    // public function importLogs()
    // {
    //     return $this->belongsTo(ImportLog::class, 'importLog_id', 'id');
    // }
}

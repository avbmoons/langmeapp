<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Lexicon extends Model
{
    use HasFactory;

    protected $table = 'lexicons';

    protected $fillable = [
        'pattern_id',
        'word_id',
        'translation',
        'spell_base',
        'spell_eng',
        'status',
    ];

    public function patterns()
    {
        return $this->belongsTo(Pattern::class, 'pattern_id', 'id');
    }

    public function words()
    {
        return $this->belongsTo(Word::class, 'word_id', 'id');
    }

    public function getLexicons():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getLexiconById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}

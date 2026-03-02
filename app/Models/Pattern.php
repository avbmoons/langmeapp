<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Pattern extends Model
{
    use HasFactory;

    protected $table = 'patterns';

    protected $fillable = [
        'lang_id',
        'title',
        'description',
        'status',
    ];

    public function langs()
    {
        return $this->belongsTo(Lang::class, 'lang_id', 'id');
    }

    public function lexiconsFromPatterns()
    {
        return $this->hasMany(Lexicon::class);
    }

    public function getPatterns():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getPatternById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}

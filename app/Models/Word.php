<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $fillable = [
        'code',
        'title',
        'status',
    ];

    protected $casts = [
        'theme_ids' => 'array',
    ];

    public function lexiconsFromWords()
    {
        return $this->hasMany(Lexicon::class);
    }

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'theme_has_words', 'word_id', 'theme_id', 'id', 'id');
    }


    public function getWords():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getWordById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}

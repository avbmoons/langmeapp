<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'themes';

    protected $fillable = [
        "id",
        'code',
        'title',
        'title_base',
        'description',
        'status',
    ];

    public function words(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'theme_has_words', 'theme_id', 'word_id', 'id', 'id');
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'theme_has_tasks', 'theme_id', 'task_id', 'id', 'id');
    }

     public function getThemes():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getThemeById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
  
}

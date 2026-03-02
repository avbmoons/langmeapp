<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Lang extends Model
{
    use HasFactory;

    protected $table = 'langs';

    protected $fillable = [
        'id',
        'code',
        'title',
        'native',
        'alias',
        'position',
        'status',
    ];

    public function patternsFromLangs()
    {
        return $this->hasMany(Pattern::class);
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'lang_has_tasks', 'lang_id', 'task_id', 'id', 'id');
    }

    public function getLangs():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getLangById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}



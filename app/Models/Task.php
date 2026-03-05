<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'mode_id',
        'num_enjoy',
        'num_normal',
        'num_worry',
        'status',
    ];

    protected $casts = [
        'lang_ids' => 'array',
        'theme_ids' => 'array',
    ];

    public function modes()
    {
        return $this->belongsTo(Mode::class, 'mode_id', 'id');
    }

    public function langs(): BelongsToMany
    {
        return $this->belongsToMany(Lang::class, 'lang_has_tasks', 'task_id', 'lang_id', 'id', 'id');
    }

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'theme_has_tasks', 'task_id', 'theme_id', 'id', 'id');
    }

    public function tasksFromThemes()
    {
        return $this->hasMany(Task::class);
    }

    public function tasksFromLang()
    {
        return $this->hasMany(Task::class);
    }

    public function getTasks():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getTaskById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}

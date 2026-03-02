<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Mode extends Model
{
    use HasFactory;

    protected $table = 'modes';

    protected $fillable = [
        'id',
        'code',
        'title',
        'description',
        'status',
    ];

    public function tasksFromModes()
    {
        return $this->hasMany(Task::class);
    }

    public function getModes():Collection
    {
        return DB::table($this->table)->get();
    }

    public function getModeById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}

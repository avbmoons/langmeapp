<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'themes';

    public function getThemes():Collection    //array 
    {
        //return DB::select("select id, theme, theme_base, description, status, created_at, updated_at from {$this->table}");
        return DB::table($this->table)->get();
    }

    public function getThemeById(int $id): mixed
    {
        // return DB::selectOne("select id, theme, theme_base, description, status, created_at, updated_at from {$this->table} where id = :id", [
        //     'id' => $id,
        // ]);
        return DB::table($this->table)->find($id);
    }
}

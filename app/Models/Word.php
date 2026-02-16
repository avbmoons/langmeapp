<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    public function getWords():Collection     //array 
    {
        //return DB::select("select id, word, status, created_at, updated_at from {$this->table}");
        return DB::table($this->table)->get();
    }

    public function getWordById(int $id): mixed
    {
        // return DB::selectOne("select id, word, status, created_at, updated_at from {$this->table} where id = :id", [
        //     'id' => $id,
        // ]);
        return DB::table($this->table)->find($id);
    }
}

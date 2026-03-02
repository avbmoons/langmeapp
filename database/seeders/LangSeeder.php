<?php

namespace Database\Seeders;

use App\Enums\Position;
use App\Enums\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('langs')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'code' => random_int(1, 10),
                'title' => fake()->text(20),
                'native' => fake()->text(20),
                'alias' => fake()->text(10),
                'status' => Status::DRAFT->value,
                'position' => Position::DRAFT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}

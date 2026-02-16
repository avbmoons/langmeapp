<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modes')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'mode' => fake()->text(10),
                'description' => fake()->text(100),
                'status' => Status::DRAFT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}

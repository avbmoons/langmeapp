<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait ModesTrait
{
    public function getModes(int $id = null): array //int $id = null)
    {
        $modes = [];
        $quantityModes = 5;

        if ($id === null) {
            for($i=1; $i <= $quantityModes; $i++) {
                $modes[$i] = [
                    'id' => $i,
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(100),
                    'created_at' => now()->format('d-m-Y H:i'),
                ];
            }
            return $modes;
        }
        return [
            'id' => $id,
            'title' => fake()->jobTitle(),
            'description' => fake()->text(100),
            'created_at' => now()->format('d-m-Y H:i'),
        ];
    }
    
}
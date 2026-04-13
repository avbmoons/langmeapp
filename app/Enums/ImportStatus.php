<?php

declare(strict_types=1);

namespace App\Enums;

enum ImportStatus: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
    case PENDING = 'pending';

    public static function all(): array{
        return [
            self::SUCCESS->value,
            self::ERROR->value,
            self::PENDING->value,
        ];
    }
}
<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';
    case CLOSE = 'close';

    public static function all(): array{
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value,
            self::CLOSE->value,
        ];
    }
}
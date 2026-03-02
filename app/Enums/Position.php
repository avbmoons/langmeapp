<?php

declare(strict_types=1);

namespace App\Enums;

enum Position: string
{
    case DRAFT = 'draft';
    case BASE = 'base';
    case OTHER = 'other';    
    case BLOCKED = 'blocked';

    public static function all(): array{
        return [
            self::DRAFT->value,
            self::BASE->value,
            self::OTHER->value,
            self::BLOCKED->value,            
        ];
    }
}
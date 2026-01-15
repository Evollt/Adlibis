<?php

declare(strict_types=1);

namespace App\Enums;

enum ReviewTypeEnums: int
{
    case ARTICLE = 1;
    case VIDEO_ARTICLE = 2;
    case USER = 3;

    public function getDescription(): string
    {
        return match ($this) {
            self::ARTICLE => 'Новость',
            self::VIDEO_ARTICLE => 'Видео новость',
            self::USER => 'Пользователь',
        };
    }
}

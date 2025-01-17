<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum ModulePrefixEnum: string
{
    case POST_MODULE = 'posts';

    case USER_MODULE = 'users';
}

<?php

namespace App\Enums\User;

enum UserProviderEnum: string
{
    case Merchant = 'merchant';
    case Partner = 'partner';
}

<?php

namespace App\Enums\Program;

enum ProgramStatusEnum: string
{
    case PENDING = 'pending';
    case ACTIVATED = 'activated';
    case DEACTIVATED = 'deactivated';
}

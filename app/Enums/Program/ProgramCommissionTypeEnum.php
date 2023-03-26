<?php

namespace App\Enums\Program;

enum ProgramCommissionTypeEnum: string
{
    case FIXED = 'fixed';
    case PERCENT = 'percent';
}

<?php

namespace App\Enums\Program;

enum ProgramCommissionTypeEnum: string
{
    case Fixed = 'fixed';
    case Percent = 'percent';
}

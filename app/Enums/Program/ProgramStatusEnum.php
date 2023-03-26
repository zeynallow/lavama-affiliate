<?php

namespace App\Enums\Program;

enum ProgramStatusEnum: string
{
    case Pending = 'pending';
    case Activated = 'activated';
    case Deactivated = 'deactivated';

    public function color(): string
    {
        return match ($this) {
            ProgramStatusEnum::Pending => 'warning',
            ProgramStatusEnum::Activated => 'success',
            ProgramStatusEnum::Deactivated => 'danger',
        };
    }
}

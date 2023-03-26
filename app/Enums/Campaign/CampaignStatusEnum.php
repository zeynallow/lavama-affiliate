<?php

namespace App\Enums\Campaign;

enum CampaignStatusEnum: string
{
    case Pending = 'pending';
    case Activated = 'activated';
    case Deactivated = 'deactivated';

    public function color(): string
    {
        return match ($this) {
            CampaignStatusEnum::Pending => 'warning',
            CampaignStatusEnum::Activated => 'success',
            CampaignStatusEnum::Deactivated => 'danger',
        };
    }
}

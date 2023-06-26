<?php

namespace App\Enums\Merchant;

enum MerchantPartnerStatusEnum: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';

    public function color(): string
    {
        return match ($this) {
            MerchantPartnerStatusEnum::Pending => 'warning',
            MerchantPartnerStatusEnum::Accepted => 'success',
            MerchantPartnerStatusEnum::Rejected => 'danger',
        };
    }
}

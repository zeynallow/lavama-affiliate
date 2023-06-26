<?php

namespace App\Models\Merchant;

use App\Enums\Merchant\MerchantPartnerStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantPartner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => MerchantPartnerStatusEnum::class
    ];
}

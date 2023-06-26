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

    public function scopeMerchantOwner($query)
    {
        $user = auth()->user();
        $query->whereIn('merchant_partners.merchant_id', $user->merchants->pluck('id'));
    }

    public function scopePending($query)
    {
        $query->where('merchant_partners.status', MerchantPartnerStatusEnum::Pending);
    }

    public function scopeAccepted($query)
    {
        $query->where('merchant_partners.status', MerchantPartnerStatusEnum::Accepted);
    }

    public function scopeRejected($query)
    {
        $query->where('merchant_partners.status', MerchantPartnerStatusEnum::Rejected);
    }
}

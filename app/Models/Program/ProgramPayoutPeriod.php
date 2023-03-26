<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPayoutPeriod extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getMerchantPayoutPeriods($merchantIds)
    {
        $generalPayoutPeriods = ProgramPayoutPeriod::whereNull('owner_merchant_id')->get();
        $merchantPayoutPeriods = ProgramPayoutPeriod::whereIn('owner_merchant_id', $merchantIds)->get();
        return $generalPayoutPeriods->merge($merchantPayoutPeriods);
    }
}

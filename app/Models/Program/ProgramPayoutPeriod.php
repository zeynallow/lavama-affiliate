<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPayoutPeriod extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getVendorPayoutPeriods($vendorIds)
    {
        $generalPayoutPeriods = ProgramPayoutPeriod::whereNull('owner_vendor_id')->get();
        $vendorPayoutPeriods = ProgramPayoutPeriod::whereIn('owner_vendor_id', $vendorIds)->get();
        return $generalPayoutPeriods->merge($vendorPayoutPeriods);
    }
}

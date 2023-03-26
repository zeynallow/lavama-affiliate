<?php

namespace App\Models\Program;

use App\Enums\Program\ProgramCommissionTypeEnum;
use App\Enums\Program\ProgramStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ProgramStatusEnum::class,
        'sale_commission_type' => ProgramCommissionTypeEnum::class,
        'click_commission_type' => ProgramCommissionTypeEnum::class,
    ];

    public function scopeOwner($query)
    {
        $user = auth()->user();
        $query->whereIn('owner_vendor_id', $user->vendors->pluck('id'))
            ->where('owner_user_id', $user->id);
    }

}

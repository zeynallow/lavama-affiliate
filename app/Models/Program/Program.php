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

}

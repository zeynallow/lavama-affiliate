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

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant\Merchant', 'owner_merchant_id');
    }

    public function scopeOwner($query)
    {
        $user = auth()->user();
        $query->whereIn('owner_merchant_id', $user->merchants->pluck('id'))
            ->where('owner_user_id', $user->id);
    }

    public function scopeActivated($query)
    {
        $query->where('status', ProgramStatusEnum::Activated);
    }

    public function scopePending($query)
    {
        $query->where('status', ProgramStatusEnum::Pending);
    }

    public function scopeDeactivated($query)
    {
        $query->where('status', ProgramStatusEnum::Deactivated);
    }

    public function payout_period()
    {
        return $this->belongsTo('App\Models\Program\ProgramPayoutPeriod', 'payout_period_id');
    }

    public function getPresenterTitleAttribute()
    {
        $title = $this->name;

        if ($this->is_sale_tracking) {
            $title .= ' | Sale:';
            if ($this->sale_commission_type == ProgramCommissionTypeEnum::Percent) {
                $title .= $this->sale_commission_value . ' %';
            } else {
                $title .= $this->sale_commission_value . ' [' . $this->sale_commission_type->value . ']';
            }
        }

        if ($this->is_click_tracking) {
            $title .= ' | Click:';
            if ($this->click_commission_type == ProgramCommissionTypeEnum::Percent) {
                $title .= $this->click_commission_value . ' %';
            } else {
                $title .= $this->click_commission_value . ' [' . $this->click_commission_type->value . ']';
            }
        }

        if ($this->payout_period_id) {
            $title .= ' | Payout:' . $this->payout_period->name;
        }

        return $title;

    }

}

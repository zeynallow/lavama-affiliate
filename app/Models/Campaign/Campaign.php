<?php

namespace App\Models\Campaign;

use App\Enums\Campaign\CampaignStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => CampaignStatusEnum::class
    ];

    public function program()
    {
        return $this->belongsTo('App\Models\Program\Program', 'program_id');
    }

    public function scopeOwner($query)
    {
        $user = auth()->user();
        $query->select('campaigns.*')
            ->leftJoin('programs', 'programs.id', 'campaigns.program_id')
            ->whereIn('programs.owner_merchant_id', $user->merchants->pluck('id'))
            ->where('programs.owner_user_id', $user->id);
    }

    public function scopeActivated($query)
    {
        $query->where('status', CampaignStatusEnum::Activated);
    }

    public function scopePending($query)
    {
        $query->where('status', CampaignStatusEnum::Pending);
    }

    public function scopeDeactivated($query)
    {
        $query->where('status', CampaignStatusEnum::Deactivated);
    }

    public function getDurationAttribute()
    {
        if (is_null($this->start_datetime) && is_null($this->end_datetime)) {
            return 'Lifetime';
        } else {
            return $this->start_datetime . ' - ' . $this->end_datetime;
        }
    }
}

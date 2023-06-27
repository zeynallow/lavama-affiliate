<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Merchant\MerchantPartnerStatusEnum;
use App\Enums\User\UserProviderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Merchant\Merchant;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserProviderEnum::class
    ];

    public function getFullnameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getDefaultMerchant()
    {
        $merchants = $this->merchants;

        if (count($merchants) > 0) {
            return $this->merchants[0];
        }

        return null;
    }

    public function getDefaultMerchantId()
    {
        $merchants = $this->merchants;

        if (count($merchants) > 0) {
            return $this->merchants[0]->id;
        }

        return null;
    }

    public function merchants()
    {
        return $this->belongsToMany(Merchant::class, 'merchant_users');
    }

    public function joined_merchants()
    {
        return $this->belongsToMany(Merchant::class, 'merchant_partners')
            ->where('status', MerchantPartnerStatusEnum::Accepted);
    }


}

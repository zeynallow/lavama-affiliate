<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function partner()
    {
        return $this->hasMany('App\Models\Merchant\MerchantPartner', 'merchant_id');
    }

    public function ownerPartner()
    {
        return $this->hasOne('App\Models\Merchant\MerchantPartner', 'merchant_id')
            ->where('user_id', auth()->user()->id);
    }


}

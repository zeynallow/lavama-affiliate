<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorUser extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
}

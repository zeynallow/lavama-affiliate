<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller as Controller;
use App\Models\Merchant\Merchant;

class MerchantController extends Controller
{

    public function index()
    {
        # Sort Active Campaign Merchants
        $merchants = Merchant::orderBy('created_at', 'desc')->paginate(10);
        return view('publisher.merchants.index', compact('merchants'));
    }


}

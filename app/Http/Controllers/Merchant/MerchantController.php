<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller as Controller;
use App\Models\Merchant\Merchant;
use App\Models\Merchant\MerchantUser;
use Illuminate\Http\Request;

class MerchantController extends Controller
{

    public function create()
    {
        return view('merchant.merchants.create');
    }

    public function edit()
    {
        $merchant = auth()->user()?->getDefaultMerchant();
        return view('merchant.merchants.edit', compact('merchant'));
    }

    public function store(Request $request)
    {
        # Validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'nullable|email'
        ]);

        # Create
        $merchant = new Merchant();
        $merchant->name = $request->name;
        $merchant->description = $request->description;
        $merchant->email = $request->email;
        $merchant->website = $request->website;
        $merchant->facebook = $request->facebook;
        $merchant->instagram = $request->instagram;
        $merchant->youtube = $request->youtube;
        $merchant->linkedin = $request->linkedin;
//        $merchant->logo = $request->logo;
        $merchant->save();

        # Attach User
        MerchantUser::create([
            'user_id' => auth()->user()->id,
            'merchant_id' => $merchant->id
        ]);

        # Redirect Dashboard
        return redirect()->route('merchant.dashboard')->with(['success' => 'Merchant created successfully']);
    }

    public function update(Request $request)
    {
        # Validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'nullable|email'
        ]);

        # Update
        $merchant = auth()->user()?->getDefaultMerchant();

        $merchant->name = $request->name;
        $merchant->description = $request->description;
        $merchant->email = $request->email;
        $merchant->website = $request->website;
        $merchant->facebook = $request->facebook;
        $merchant->instagram = $request->instagram;
        $merchant->youtube = $request->youtube;
        $merchant->linkedin = $request->linkedin;
//        $merchant->logo = $request->logo;
        $merchant->save();

        # Redirect Dashboard
        return redirect()->back()->with(['success' => 'Merchant updated successfully']);
    }
}

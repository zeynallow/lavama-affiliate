<?php

namespace App\Http\Controllers\AppVendor;

use App\Http\Controllers\Controller as Controller;
use App\Models\Vendor\Vendor;
use App\Models\Vendor\VendorUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{

    public function create()
    {
        return view('app-vendor.vendors.create');
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
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->description = $request->description;
        $vendor->email = $request->email;
        $vendor->website = $request->website;
        $vendor->facebook = $request->facebook;
        $vendor->instagram = $request->instagram;
        $vendor->youtube = $request->youtube;
        $vendor->linkedin = $request->linkedin;
//        $vendor->logo = $request->logo;
        $vendor->save();

        # Attach User
        VendorUser::create([
            'user_id' => auth()->user()->id,
            'vendor_id' => $vendor->id
        ]);

        # Redirect Dashboard
        return redirect()->route('app-vendor.dashboard')->with(['success' => 'Vendor created successfully']);
    }
}

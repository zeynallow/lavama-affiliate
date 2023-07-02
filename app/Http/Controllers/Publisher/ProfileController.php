<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller as Controller;
use App\Models\Partner\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('publisher.settings.profile', compact('user'));
    }

    public function createPartner()
    {
        return view('publisher.settings.create_partner');
    }

    public function handleUpdateProfile(Request $request)
    {
        # Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        # Update
        $user = auth()->user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        # Redirect Dashboard
        return redirect()->back()->with(['success' => 'User updated successfully']);
    }

    public function handleUpdatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        $checkOldPassword = Hash::check($request->old_password, $user->password);

        if ($checkOldPassword) {

            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with(['success' => 'User password updated successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Old password is wrong']);
        }

    }

    public function handleCreatePartner(Request $request)
    {
        # Validation
        $request->validate([
            'about' => 'required',
            'date_of_birth' => 'required',
        ]);

        # Create
        $partner = new Partner();
        $partner->about = $request->about;
        $partner->date_of_birth = $request->date_of_birth;
        $partner->website = $request->website;
        $partner->facebook = $request->facebook;
        $partner->instagram = $request->instagram;
        $partner->youtube = $request->youtube;
        $partner->linkedin = $request->linkedin;
        $partner->address = $request->address;
        $partner->user_id = auth()->user()->id;
        $partner->save();

        # Redirect Dashboard
        return redirect()->route('publisher.dashboard')->with(['success' => 'Partner created successfully']);
    }

    public function handleUpdatePartner(Request $request)
    {
        # Validation
        $request->validate([
            'about' => 'required',
            'date_of_birth' => 'required',
        ]);

        # Update
        $partner = auth()->user()->partner()->first();

        $partner->about = $request->about;
        $partner->address = $request->address;
        $partner->date_of_birth = $request->date_of_birth;
        $partner->website = $request->website;
        $partner->facebook = $request->facebook;
        $partner->instagram = $request->instagram;
        $partner->youtube = $request->youtube;
        $partner->linkedin = $request->linkedin;
        $partner->save();

        # Redirect Dashboard
        return redirect()->back()->with(['success' => 'Partner updated successfully']);
    }
}

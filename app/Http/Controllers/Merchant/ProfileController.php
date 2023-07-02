<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('merchant.profile.index', compact('user'));
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

    public function security()
    {
        $user = auth()->user();
        return view('merchant.profile.security', compact('user'));
    }

    public function notification()
    {
        $user = auth()->user();
        return view('merchant.profile.notification', compact('user'));
    }



}

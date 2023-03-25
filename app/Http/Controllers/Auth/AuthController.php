<?php

namespace App\Http\Controllers\Auth;

use App\Enums\User\UserProviderEnum;
use App\Http\Controllers\Controller as Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class AuthController extends Controller
{

    public function signIn()
    {
        return view('auth.signIn');
    }

    public function signUp()
    {
        return view('auth.signUp');
    }

    public function handleSignUp(Request $request)
    {
        # Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'provider' => ['required', new Enum(UserProviderEnum::class)]
        ]);

        try {

            # Check Exist User
            $checkUser = User::where('provider', $request->provider)->where('email', $request->email)->count();

            if ($checkUser) {
                return redirect()->back()->with(['error' => 'User exist']);
            }

            # Create User
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->provider = $request->provider;
            $user->save();

            # Auto SignIn
            Auth::login($user);

            # Redirect Dashboard
            return redirect()->route('app-' . $request->provider . '.dashboard');
        } catch (\Exception $e) {
            # Error Handler
            return redirect()->back()->with(['error' => 'Something Went Error']);
        }

    }

    public function handleSignIn(Request $request)
    {
        # Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'provider' => ['required', new Enum(UserProviderEnum::class)]
        ]);

        # Attempt User
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'provider' => $request->provider
        ]);

        # Redirect Dashboard
        if ($auth) {
            return redirect()->route('app-' . $request->provider . '.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'E-mail və ya şifrə doğru deyil']);
        }

    }

    public function handleSignOut()
    {
        Auth::logout();
        return redirect()->route('auth.signIn');
    }

}

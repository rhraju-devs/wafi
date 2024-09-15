<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        $pageTitle = "Login";
        return view('user.auth.login', compact('pageTitle'));
    }

    public function loginSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', trim($request->email))
        ->where('role', Status::USER_ROLE_ADMIN)
        ->first();

        if (!$user) {
            $notify[] = ['error','User not found or does not have admin access.'];
            return back()->withNotify($notify);
        }

        if (!Hash::check(trim($request->password), trim($user->password))) {
            $notify[] = ['error','Incorrect password.'];
            return back()->withNotify($notify);
        }

        Auth::login($user);
        $notify[] = ['success','Login successfully'];
        return redirect()->route('user.dashboard')->withNotify($notify);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $notify[] = ['success','You have successfully logout'];
        return redirect()->route('user.login')->withNotify($notify);
    }
}

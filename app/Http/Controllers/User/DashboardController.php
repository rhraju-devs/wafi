<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard Page";
        return view('user.dashboard', compact('pageTitle'));
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        $notify[] = ['success', 'Profile updated successfully'];
        return back()->withNotify($notify);
    }

    public function submitPassword(Request $request)
    {
        $passwordValidation = Password::min(6);
        $request->validate([
            'current_password' => 'required',
            'password' => ['required','confirmed',$passwordValidation]
        ]);

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = ['success', 'Password changes successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'The password doesn\'t match!'];
            return back()->withNotify($notify);
        }
    }

    public function profilePictureUpdate(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();
        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('adminProfile'), getFileSize('adminProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->save();

        $notify[] = ['success', 'Profile image has been updated successfully'];
        return back()->withNotify($notify);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = auth()->user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        $notify[] = ['success', 'Profile has been updated successfully'];
        return back()->withNotify($notify);
    }


}

<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAccountController extends Controller
{
    public function edit()
    {
        return view('account.change-password');
    }

    public function changePassword()
    {
        request()->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return redirect()->route('account.change-password')->with('status', 'Your password has been change successfully');
        } else {
            return redirect()->route('account.change-password')->with('error', 'Wrong your current password');
        }
    }
}

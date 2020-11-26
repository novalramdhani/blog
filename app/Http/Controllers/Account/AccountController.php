<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function detail()
    {
        return view('account.detail');
    }

    public function edit()
    {
        return view('account.edit');
    }

    public function updateProfile()
    {
        if(request()->file('thumbnail')) {
            $thumbnail = request()->file('thumbnail')->store('images/users');
            Storage::delete(auth()->user()->thumbnail);
        } else {
            $thumbnail = auth()->user()->thumbnail;
        }

        request()->file('thumbnail')
                  ? $thumbnail = request()->file('thumbnail')->store('images/users')
                  : null;

        $result = request()->validate([
            'thumbnail' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'name' => ['required', 'min:5'],
            'username' => ['required', 'min:5', 'max:25', 'alpha_dash'],
            'email' => ['required', 'email']
        ]);

        $result['thumbnail'] = $thumbnail;

        auth()->user()->update($result);

        return redirect()
                ->route('account.edit')
                ->with('status', 'Your profile has been change successfully.');
    }
}

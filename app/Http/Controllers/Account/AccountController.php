<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
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

    public function updateProfile(AccountRequest $request)
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

        $result = $request->all();

        $result['thumbnail'] = $thumbnail;

        auth()->user()->update($result);

        return redirect()
                ->route('account.edit')
                ->with('status', 'Your profile has been change successfully.');
    }

    public function tags()
    {
        return 'hello world';
    }
}

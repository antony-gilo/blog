<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember_me = $request->remember ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $user = User::where('email', $request->email)->first();

            if ($user->is_admin()) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('home');
        } else {
            Session::flash('invalid.login', 'Your credentials do not <strong>MATCH</strong> our records. Try again.');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
            return redirect()->back();
        }
    }
}

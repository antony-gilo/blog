<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email', $request->email)->first();

            if ($user->is_admin()) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}

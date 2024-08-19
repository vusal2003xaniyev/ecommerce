<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $login = $request->only(['email', 'password']);
        $user = User::where([['email', $request->email],['status','1']])
            ->whereIn('role',['1','2','3','4'])
            ->first();

        if ($user){
            if (Auth::attempt($login)){
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->withInput()->with('passwordError','true');
            }
        }else{
            return redirect()->back()->withInput()->with('emailError','true');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}

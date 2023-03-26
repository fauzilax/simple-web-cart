<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('login', [
            "title" => "login"
        ]);
    }

    public function signupview()
    {
        return view('signup', [
            "title" => "signup"
        ]);
    }


    public function logincheck(Request $request)
    {
        $check = User::where('username', $request['username'])->first();
        if (!$check) {
            return back()->with('error', 'Wrong Username or Password');
        }
        $validate = ([
            'username' => $request['username'],
            'password' => $request['password']
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Wrong Username or Password');
    }

    public function signup(Request $request)
    {
        $data = ([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => $request['password']
        ]);
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        $user = User::create($data);
        return redirect('/login')->with('success', 'Account Successfully Created, Please Login now');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

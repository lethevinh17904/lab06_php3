<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AuthoController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->validate([
            'email'   => ['required', 'email'],
            'password'=> ['required']
        ]);

        if(Auth::attempt($data))
        {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('moives.index');
            }
                return redirect()->route('detail');

        }
        return back()->withErrors(['email'=> "Thông tin đăng nhập không chính xác"])->withInput();
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'fullname'         => ['required', 'min:5'],
            'username'         => ['required', 'min:5'],
            'email'            => ['required', 'email', 'unique:users,email'],
            'password'         => ['required', 'min:6'],
            'password_confirm' => ['required', 'same:password'],
            'avatar'           => ['nullable','image', 'max:2048']

        ]);
        // dd($data);

        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
        
}

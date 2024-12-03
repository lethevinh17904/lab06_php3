<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use    Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        // dd($user);
        return view('detail', compact('user'));
        
    }

    public function update_user()
    {
        return view('edit_user​');
    }

    public function update_userPost(Request $request)
    {
        $data = $request->validate([
            'email'      => ['required', 'email'],
            'fullname'   => ['required'],
            'username'   => ['required'],
            'avatar'     => ['nullable','image']
        ]);
        User::query()->find(Auth::user()->id)->update($data);
        return redirect()->route('detail')->with('message', 'Cập nhật thông tin người dùng thành công');
    }

    public function update_password()
    {
        return view('edit_password');
    }

    public function update_passwordPost(Request $request)
    {
        $data = $request->validate([
            'current_password'                  => ['required', 'min:6'],
            'new_password'                 => ['required', 'min:6'],
            'new_password_confirmation'         => ['required', 'same:new_password'],

        ]);
     
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác']);
        }
        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $data['password'] = $request->new_password_confirmation;
        User::query()->find($user->id)->update($data);
        // Chuyển hướng với thông báo
        return redirect('/detail')->with('message', 'Mật khẩu của bạn đã được thay đổi.');
    }

    
}

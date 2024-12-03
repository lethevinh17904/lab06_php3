<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use  Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->Where('role','=', 'user')->paginate(8);
        // dd($users);
        return view('admin.home', compact('user'));


    }
    public function Active()
    {
        
    }
}

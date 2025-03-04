<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("admin.login.index");
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email',],
            'password' => ['required', 'string',],
        ]);

        if (!Auth::guard('admin')->attempt($validate)) {
            return back()->withErrors(['email' => 'Не верный логин или пароль'])
                ->onlyInput('email');
        }

        return redirect()->intended('/admin');
    }
}

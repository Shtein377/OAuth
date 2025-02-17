<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {
         //Метод проверки аутентифицированного пользователя
        //  if(Auth::check()){
        //     return redirect()->route('user');
        //  }

        $data = $request->only(['email', 'password',]);

        $remember = (bool) $request->input('remember');


//простой способ

        if (! Auth::attempt($data, $remember)) {
            return back()->withErrors([
                'email' => 'Неверный логин или пароль!',

            ])->onlyInput('email');
        }

        //Ручной способ


        // $user = User::query()
        // ->where('email',$data['email'])
        // ->first();

        // if(! $user){
        //     return back()->withErrors([
        //                'email' => 'Неверный логин или пароль!',
        
        //             ])->onlyInput('email');
        // }

        // if(! Hash::check($data['password'],$user->password)){
        //     return back()->withErrors([
        //         'email' => 'Неверный логин или пароль!',
 
        //      ])->onlyInput('email');
        // }

        // Auth::login($user,$remember);

        $request->session()->regenerate();


        return redirect()->route('user');
    }
}

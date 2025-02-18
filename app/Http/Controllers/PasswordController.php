<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\StoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Password\ConfirmNotification;

class PasswordController extends Controller
{
    public function store(StoreRequest $request)
    {
         //найти юзера
         //отправить письмо на почту

         $email = $request->input('email');

         $user = User::query()
         ->where(compact('email'))
         ->first();

         $notification = new ConfirmNotification;
         $user?->notify($notification);



        return to_route('password.confirm');
    }

    public function update(Request $request, string $code)
    {


        dd($code);

        return to_route('login');
    }
}

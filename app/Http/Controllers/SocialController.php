<?php

namespace App\Http\Controllers;

use App\Enums\Social\SocialDriverEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Social;
use Exception;

class SocialController extends Controller
{
    public function redirect(SocialDriverEnum $driver)
    {

        session(['social_back_url' => url()->previous()]);


        return Socialite::driver($driver->value)->redirect();

    }

    public function callback(SocialDriverEnum $driver)
    {

        // dd($driver);

        try {
            $data = Socialite::driver($driver->value)->user();
        } catch (Exception $e) {
            report($e);

            return redirect()->to(session('social_back_url', '/login'));
        }

        /** @var Social */

        $social = Social::query()->firstOrCreate([
            'driver' => $driver,
            'driver_user_id' => $data->getId(),
        ]);

        if (is_null($social->user_id)) {

            $user = User::query()->create(['first_name','password'=>Str::random(10)]);
            $social->user()->associate($user)->save();
        }

        Auth::login($social->user);

        request()->session()->regenerate();

        return redirect()->intended('/user');
    }
}
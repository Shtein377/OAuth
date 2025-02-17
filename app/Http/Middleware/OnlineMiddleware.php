<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlineMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {   
        //получить  текущего пользователя
        //получить его онлаин статус
        //обновить его дату в базе в отдельной колонке в таблице юзеров

        if(!$user = Auth::user()){
            return $next($request);
        }

        if($user->online_at < now()->subMinutes(10)){
         $user->update(['online_at'=>now()]);
        }

        return $next($request);
    }

   
}

<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageHeaderMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = Language::getActive();

        // dd($languages->pluck('id')->toArray());
        $language = $request->getPreferredLanguage(
            $languages->pluck('id')->toArray(),
        );

        $language && app()->setLocale($language);

        // if($languages->contains('id', $language)){
        //    app()->setLocale($language); 
        // }

    
        return $next($request);
    }
}

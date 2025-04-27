<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke(Language $language)
    {
        //проверка - активный язык или нет
       abort_unless($language->active, 404);

       $cookie = cookie()->forever('language',$language->id);

       return back()->withCookie($cookie);
    }
}

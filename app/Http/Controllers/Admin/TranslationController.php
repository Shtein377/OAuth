<?php

namespace App\Http\Controllers\Admin;

use App\Models\Translation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Translations\SaveTranslationRequest;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class TranslationController extends Controller
{
   
    public function index()
    {
     

        return view('admin.translations.index', [
         'translations' => LanguageLine::query()
         ->latest('id')
         ->paginate(21)
        ]);
        
    }

   
    public function create()
    {
        return view('admin.translations.create', [
            'translation' => new LanguageLine,
        ]);
    }

  
    public function store(SaveTranslationRequest $request)
    {
        // dd($request->all());
        dd($request->validated());
        Translation::query()->create($request->validated());

       
    }

   
    public function show(Translation $translation)
    {
        //
    }

    public function edit(Translation $translation)
    {
        //
    }

  
    public function update(Request $request, Translation $translation)
    {
        //
    }

   
    public function destroy(Translation $translation)
    {
        //
    }
}

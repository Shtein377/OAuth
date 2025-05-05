<?php

namespace App\Http\Controllers\Admin;

use App\Models\Translation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Translations\SaveTranslationRequest;
use Illuminate\Http\Request;
// use Spatie\TranslationLoader\LanguageLine;

class TranslationController extends Controller
{
   
    public function index(Request $request)
    {
   

     //dd($query->latest('id')->toSql());

     $translations = Translation::query()
            ->filter($request->all())
            ->latest()->paginate(21);

        return view('admin.translations.index', [
            'translations' => $translations,
        ]);
        
    }

   
    public function create()
    {
        return view('admin.translations.create', [
            'translation' => new Translation,
        ]);
    }

  
    public function store(SaveTranslationRequest $request)
    {
        // dd($request->all());
        // dd($request->validated());
        Translation::query()->create($request->validated());
       
        return to_route('admin.translations.index');
       
    }

   
  

    public function edit(Translation $translation)
    {
        return view('admin.translations.edit', [
            'translation' => $translation,
        ]);
    }

  
    public function update(SaveTranslationRequest $request, Translation $translation)
    {
        $translation->update($request->validated());
       
        return to_route('admin.translations.index');
    }

   
    public function destroy(Translation $translation)
    {
        $translation->delete();
        return to_route('admin.translations.index');
    }
}

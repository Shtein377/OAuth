<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveLanguageRequest;
use Illuminate\Http\Request;


class LanguageController extends Controller
{

    public function index()
    {
        return view('admin.languages.index', [
            'languages' => Language::all(),
        ]);
    }


    public function create()
    {
        return view('admin.languages.create', [
            'language' => new Language,
        ]);
    }


    public function store(SaveLanguageRequest $request)
    {
        $validated = $request->validated();

        Language::query()->create($validated);

        return to_route('admin.languages.index');
    }


    public function show(Language $language)
    {
        //
    }


    public function edit(Language $language)
    {
        return view('admin.languages.edit', [
            'language' => $language,
        ]);
    }


    public function update(SaveLanguageRequest $request, Language $language)
    {
        $validated = $request->validated();


        $language->update(array_merge($validated,
         [
            'active' => $validated['active'] ?? false,
            'default' => $validated['default'] ?? false,
            'fallback' => $validated['fallback'] ?? false,
        ]));

        // $language->update($validated + [
        //     'active' => false,
        //     'default' => false,
        //     'fallback' => false,
        // ]);


        return to_route('admin.languages.index');
    }


    public function destroy(Language $language)
    {
        $language->delete();

        return back();
    }
}

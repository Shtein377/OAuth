<?php

namespace App\Http\Requests\Admin\Translations;

use Illuminate\Foundation\Http\FormRequest;

class SaveTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        
        // dd($text);

        $this->merge([
            'text' => array_filter((array)$this->input('text'))
        ]);

        // dd($this->all());
    }

    public function rules(): array
    {
        return [
            'group'=> ['required','string','max:50'],
            'key'=> ['required','string','max:50'],
            'text'=> ['required','array','max:50'],
            'text.*'=> ['required','string'],
        ];
    }
}

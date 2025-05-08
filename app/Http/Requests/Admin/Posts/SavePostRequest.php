<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }



    protected function prepareForValidation()
    {
        
       

        $this->merge([
            'title' => array_filter((array)$this->input('title'))
        ]);

        
          
        $this->merge([
            'content' => array_filter((array)$this->input('content'))
        ]);

        // dd([$this->input('title'),$this->input('content')]);
       
    }

   
    public function rules(): array
    {
        return [
            'title'=> ['required','array'],
            'title.*'=> ['required','string','max:150'],
            'content'=> ['required','array'],
            'content.*'=> ['required','string'],
            
        ];

       
    }
   
}

<form action="{{ $action }}" method="POST" >
    @csrf
     @method($method)
    {{-- <div class="row">
        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Заголовок') }}
                </lable>
                <input type="text" name="title" value="{{ old('title',$post->title )}}" class="form-control mt-2"
                    autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Контент') }}
                </lable>
                <textarea type="text" name="content" value="" class="form-control mt-2" rows="3">{{ old("content.{$post->content}", $post->content ?? '') }}</textarea>
            </div>
        </div>
    </div> --}}

    <span x-text="language">

    </span>


    @foreach(App\Models\Language::query()->get() as $language)

    <div class="mb-3" x-show="language === '{{ $language->id }}'">
       <lable class="form-lable ">
           {{ __('Заголовок') }}({{$language->name}})
       </lable>
       <input name="title[{{$language->id}}]" value="{{old("title.{$language->id}",$post->getTranslation('title',$language->id, false) ?? '')}}" class="form-control">
       <lable class="form-lable">
        {{__("Контент")}}
       </lable>
       <textarea  name="content[{{$language->id}}]"  class="form-control mt-2" rows="5">{{ old("content.{$language->id}", $post->getTranslation('content',$language->id, false)?? '') }}</textarea>
   </div>
   
    @endforeach


    {{-- {{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }} --}}
    

   

   

    <button type="submit" class="btn btn-primary">
        {{ __('Сохранить') }}
    </button>

</form>
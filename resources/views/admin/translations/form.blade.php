<form action="{{ $action }}" method="POST">
    @csrf
     @method($method)
    <div class="row">
        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Группа') }}
                </lable>
                <input type="text" name="group" value="{{ old('group',$translation->group )}}" class="form-control mt-2"
                    autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Ключ') }}
                </lable>
                <input type="text" name="key" value="{{ old('key', $translation->key) }}" class="form-control mt-2">
            </div>
        </div>
    </div>


 @foreach(App\Models\Language::query()->get() as $language)

 <div class="mb-3">
    <lable class="form-lable ">
        {{ __('Текст') }}({{$language->name}})
    </lable>
    <textarea  name="text[{{$language->id}}]"  class="form-control mt-2" rows="5">{{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }}</textarea>
</div>

 @endforeach

    

   

   

    <button type="submit" class="btn btn-primary">
        {{ __('Сохранить') }}
    </button>

</form>
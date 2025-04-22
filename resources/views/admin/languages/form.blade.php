<form action="{{ $action }}" method="POST">
    @csrf
     @method($method)
    <div class="row">
        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Id языка') }}
                </lable>
                <input type="text" name="id" value="{{ old('id',$language->id )}}" class="form-control mt-2"
                    autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6  ">
            <div class="mb-3">
                <lable class="form-lable ">
                    {{ __('Название языка') }}
                </lable>
                <input type="text" name="name" value="{{ old('id', $language->name) }}" class="form-control mt-2">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" @checked(old('active',$language->active))
                name="active" id="active">
            <label class="form-check-label" for="flexCheckDefault">
                {{ __('Показать на сайте') }}
            </label>
        </div>

    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" @checked(old('default' ,$language->default))
                name="default" id="default">
            <label class="form-check-label" for="flexCheckDefault">
                {{ __('По-умолчанию') }}
            </label>
        </div>

    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" @checked(old('fallback',$language->fallback))
                name="fallback" id="fallback">
            <label class="form-check-label" for="flexCheckDefault">
                {{ __('Резервный') }}
            </label>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">
        {{ __('Сохранить') }}
    </button>

</form>
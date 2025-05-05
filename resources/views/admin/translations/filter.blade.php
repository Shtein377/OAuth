<div class="bg-light rounded p-3">
    <form action="{{ route('admin.translations.index') }}" method="GET">

        <div class="row">
            <div class="col-6 col-md-4">
                <div class="mb-3">
                    <select class="form-control form-control-sm" name="group" id="">
                        <option value="">
                            {{ __('Все группы') }}
                        </option>
                        @foreach (App\Models\Translation::query()->distinct()->pluck('group') as $group)
                            <option value="{{ $group }}" {{ $group === request('group') ? 'selected' : '' }}>
                                {{ $group }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="mb-3">
                    <input class="form-control form-control-sm" name="key" value="{{request('key')}}" placeholder="ключ">
                      
                    </input>
                </div>
            </div>


            <div class="col-6 col-md-4">
                <div class="mb-3">
                    <input class="form-control form-control-sm" name="search" value="{{request('search')}}" placeholder="Поиск">
                      
                    </input>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-6 col-md-4">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    {{ __('Применить') }}
                </button>
            </div>

            <div class="col-6 col-md-4">
                <a href="{{ route('admin.translations.index') }}" class="btn btn-secondary btn-sm w-100">
                    {{ __('Очистить') }}
                </a>
            </div>
        </div>


    </form>
</div>

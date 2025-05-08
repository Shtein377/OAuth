@extends('layouts.admin')

@section('admin.title', 'Посты')

@section('admin.content')








    <div class="card">
        <div class="card-body">
           

            <div class="d-flex justify-content-between">

                <div>
                    <h5 class="card-title">
                        {{ __('Создать пост') }}
        
                    </h5>
                </div>

               <div>
            <select x-model="language" class="form-control">
                @foreach (App\Models\Language::query()->get() as $language)
                <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
            </select>
               </div>
            </div>

            @include('admin.posts.form', [
              'action' => route('admin.posts.store'),
              'method' => 'POST',
          ])
        </div>
    </div>


@endsection

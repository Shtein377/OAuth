@extends('layouts.admin')

@section('admin.title', 'Переводы')

@section('admin.content')








    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Изменить перевод') }}

            </h5>

            @include('admin.translations.form', [
              'action' => route('admin.translations.update',$translation),
              'method' => 'PUT',
          ])
        </div>
    </div>


@endsection

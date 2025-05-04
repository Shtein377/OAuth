@extends('layouts.main')


@section('main.title', trans('pluralization.title'))

@section('main.content')


    {{-- {{trans('placeholders.content')}} {{app()->getLocale()}} --}}

    @php($count = 1)
    {{ trans_choice('pluralization.example', $count,) }}




@endsection

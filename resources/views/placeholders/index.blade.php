@extends('layouts.main')


@section('main.title',trans('placeholders.title'))

@section('main.content')


{{-- {{trans('placeholders.content')}} {{app()->getLocale()}} --}}

{{trans('placeholders.examples',[
    'discount' => '10$',
    'date'=>now()->translatedFormat('j F Y'),
])}}

@endsection
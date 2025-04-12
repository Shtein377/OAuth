@extends('layouts.base')

@section('page.title',$post->title)

@section('content')
<a href="{{route('blog')}}">
    назад
</a>

<h1 class="mb-5">
    {{$post->title}}
</h1>

<p>
   {{$post->description}} 
</p>


    
@endsection
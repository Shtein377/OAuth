@extends('layouts.base')

@section('page.title','Посты')

@section('content')
<h1 class="mb-5">
    Список постов
</h1>

@if (@empty($posts))

no posts

@else

@foreach ($posts as $post)

<div class="mb-4">

    <h4>
        <a href="{{route('blog.show',$post->id)}}">
            {{$post->title}}
        </a>
    </h4>
    <p>
        {{$post->description}}
    </p>
    
 
   
</div>
    

    
@endforeach
    
@endif


    
@endsection
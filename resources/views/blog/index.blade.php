@extends('layouts.main')


@section('main.title', trans('blog.title'))

@section('main.content')


    {{-- {{trans('placeholders.content')}} {{app()->getLocale()}} --}}

    @if ($posts->isEmpty())
        {{ trans('common.empty') }}
    @else
        @foreach($posts as $post)
        <article>
            <h2 class="h4">{{$post->title}}</h2>
            <p>{{$post->content}}</p>
            <p class="text-muted small">{{$post->created_at->translatedFormat('j F Y')}}</p>
   
           </article>
        @endforeach
    @endif

    {{ $posts->appends(request()->all())->links() }}


@endsection

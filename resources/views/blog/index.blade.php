@extends('layouts.base')

@section('page.title', 'Посты')

@section('content')



    <section>
        <x-container>

           
            <div class="row">
            <x-title>
                {{__('Список постов')}}
            </x-title>

               
                    @if (empty($posts))

                    no posts
                @else
                    @foreach ($posts as $post)
                    <div class="col-12 col-md-6 ">
                   <x-post.card :post="$post" :loop="$loop">

                   </x-post.card>
                    </div>
                    @endforeach
            
                @endif

                
            </div>
        </x-container>
    </section>
    

   



@endsection

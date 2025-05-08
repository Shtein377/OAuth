@extends('layouts.base')


@section('content')

@include('includes.navbar')
   <section>

    <div class="container">
<div class="mb-3">

    
    <h1 class="h3 m-0">
        @yield('main.title')
    </h1>
</div>
        @yield('main.content')
    </div>
   </section>
@endsection
@extends('layouts.base')


@section('content')
    @include('admin.includes.navbar')
    <section x-data="{language:'ru'}">

        <div class="container">
          
           @include('admin.includes.title')
           @include('admin.includes.errors')
            @yield('admin.content')
        </div>
    </section>
@endsection

@push('js')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush

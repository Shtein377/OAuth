@extends('layouts.auth')

@section('page.title','Регистрация')

@section('auth.content')


<x-card>
  <x-card-header>
      <x-card-title>
          {{__('Регистрация')}}
      </x-card-title>
  </x-card-header>

  <x-card-body>
      <x-form action="{{route('register.store')}}" method="POST">
        @csrf
        <x-form-item>
          <x-label required>
          {{__('Имя')}}
          </x-label>
          <x-input  name="name" class="form-control " autofocus/>
        </x-form-item>

        <x-form-item>
          <x-label required>
          {{__('Email')}}
          </x-label>
          <x-input type="email" name="email" class="form-control " />
        </x-form-item>

        <x-form-item>
          <x-label required>
          {{__('Пароль')}}
          </x-label>
          <x-input type="password" name="password" class="form-control "/>
        </x-form-item>

        <x-form-item>
          <x-label required>
          {{__('Повторите пароль')}}
          </x-label>
          <x-input type="password" name="password_confirmation" class="form-control "/>
        </x-form-item>

        <x-form-item>
 <x-checkbox name="remember">
  {{__('Согласен на обработку персональных данных')}}
 </x-checkbox>
        </x-form-item>

        <x-button type="submit" class=" mt-2">
          {{ __('Войти') }}
        </x-button>

      </x-form>
  </x-card-body>
</x-card>
  
    
@endsection
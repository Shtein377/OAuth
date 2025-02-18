
<div class="security">
    
<x-tittle >
    {{__('Безопасность')}}
    <x-slot:description>
{{__('Настройки безопасности вашего аккаунта!')}}
    </x-slot:description>
</x-tittle>

<x-list>
    <x-list.item>
        <x-slot:name>{{__('Пароль')}}</x-slot:name>
        <x-slot:value>
            @if($user->password_at)

            Изменен {{ $user->password_at->translatedFormat('j F Y') }}

            @else
             {{__('Пароль не менялся')}}
            @endif
        </x-slot:value>
        <x-slot:action>
            <x-link href="{{route('user.settings.password.edit')}}">
                {{__('Изменить')}}
            </x-link>
            
        </x-slot:action>

    </x-list.item>
   
</x-list>
</div>
{{-- <div class="mt-6 border-t border-gray-100">
    
</div> --}}
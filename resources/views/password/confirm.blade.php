<x-layouts.auth>
    <x-slot:title>
        {{__('Подтверждение Пароля!')}}
    </x-slot:title>
    
   
    
    <x-card>
        <x-card.body>
            {{__('Перейдите по ссылке из письма отправленного на Ваш Email для восстонавления пароля!')}}
        </x-card.body>
    </x-card>
    
    <x-slot:crosslink>
        
    <x-link href="{{route('login')}}">
        
        {{__('Войти в аккаунт')}}
    </x-link>
        
    </x-slot:crosslink>
    
    </x-layouts.auth>
    
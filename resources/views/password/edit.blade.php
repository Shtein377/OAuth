<x-layouts.auth>
    <x-slot:title>
        {{__('Изменение пароля!')}}
    </x-slot:title>
    
   
    
    <x-card>
        <x-card.body>
            <x-form action="{{ route('password.update', $password->uuid) }}" method="post">
    
    
                <x-form.item>
                    <x-form.label>{{ __('Новый пароль') }}</x-form.label>
                    <x-form.text type="password" name="password" autofocus/>
    
    
    
                </x-form.item>
    
                
    
    
    
    
                
    
                <x-button type="submit">
                    {{ __('Изменить пароль') }}
                </x-button>
            </x-form>
        </x-card.body>
    </x-card>
    
    <x-slot:crosslink>
        
    <x-link href="{{route('login')}}">
        
        {{__('Войти в аккаунт')}}
    </x-link>
        
    </x-slot:crosslink>
    
    </x-layouts.auth>
    
    
    
    
 
    
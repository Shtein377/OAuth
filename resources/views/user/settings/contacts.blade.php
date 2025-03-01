<div class="profile">
    <x-tittle >
        {{__('Ваши контакты')}}
        <x-slot:description>
    {{__('Просмотр и изменение контактных данных!')}}
        </x-slot:description>
    </x-tittle>
    
    <x-list>
        <x-list.item>
            <x-slot:name>{{__('Ваше Email')}}</x-slot:name>
            <x-slot:value>
                {{str($user->email)->mask('*',3,-4)}}
            </x-slot:value>
            <x-slot:action>
                <x-link href="{{route('user.settings.email.edit')}}" wire:navigate>
                    {{__('Изменить')}}
                </x-link>
                
            </x-slot:action>
    
        </x-list.item>
        
    </x-list>
</div>


{{-- <div class="mt-6 border-t border-gray-100">
    
</div> --}}


<x-tittle >
    {{__('Ваш Профиль')}}
    <x-slot:description>
{{__('Просмотр иредактирование персональных данных!')}}
    </x-slot:description>
</x-tittle>

<x-list>
    <x-list.item>
        <x-slot:name>{{__('Ваше Имя')}}</x-slot:name>
        <x-slot:value>
            {{$user->getFullName()}}
        </x-slot:value>
        <x-slot:action>
            <x-link href="{{route('user.settings.profile.edit')}}">
                {{__('Изменить')}}
            </x-link>
            
        </x-slot:action>

    </x-list.item>
    <x-list.item>
        <x-slot:name>{{__('Ваше Пол')}}</x-slot:name>
        <x-slot:value>
            {{ $user->gender?->name() ?: 'Не указано' }}
        </x-slot:value>
        <x-slot:action>
            <x-link href="{{route('user.settings.profile.edit')}}">
                {{__('Изменить')}}
            </x-link>
            
        </x-slot:action>

    </x-list.item>
</x-list>
{{-- <div class="mt-6 border-t border-gray-100">
    
</div> --}}
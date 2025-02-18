<x-layouts.settings>


    <x-tittle >
        {{__('Изменить пароль')}}
        <x-slot:description>
    {{__('Введите текущий и новый пароли!')}}
        </x-slot:description>
    </x-tittle>

    <x-form action="{{route('user.settings.password.update')}}" method="POST">
    
    <x-list>
        <x-list.item>
            <x-slot:name>{{__('Текущий пароль')}}</x-slot:name>
            <x-slot:value>
              <div class="grid grid-cols-2">
                <div class="col-span-2 md:col-span-1" >
                    <x-form.text type="password" name="current_password" autofocus/>
                </div>
              </div>

              
            </x-slot:value>
           
    
        </x-list.item>

        <x-list.item>
            <x-slot:name>{{__('Новый пароль')}}</x-slot:name>
            <x-slot:value>
              <div class="grid grid-cols-2">
                <div class="col-span-2 md:col-span-1" >
                    <x-form.text type="password" name="password" />
                </div>
              </div>

              
            </x-slot:value>
           
    
        </x-list.item>

        <x-list.item>
            <x-slot:name>{{__('Повторите пароль')}}</x-slot:name>
            <x-slot:value>
              <div class="grid grid-cols-2">
                <div class="col-span-2 md:col-span-1" >
                    <x-form.text type="password" name="password_confirmation" />
                </div>
              </div>

              
            </x-slot:value>
           
    
        </x-list.item>
        
    </x-list>

    <x-form.footer>
        <x-slot:buttons>
            <x-button href="{{ route('user.settings') }}" color="white">
                Отменить
            </x-button>

            <x-button type="submit">
                Сохранить
            </x-button>
        </x-slot:buttons>
    </x-form.footer>

</x-form>
    {{-- <div class="mt-6 border-t border-gray-100">
        
    </div> --}}
</x-layouts.settings>
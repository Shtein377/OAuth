<x-layouts.auth>
    <x-slot:title>
        {{__('Подтверждение Почты!')}}
    </x-slot:title>
    
   
    
    <x-card>
        <x-card.body>
            {{__('Перейдите по ссылке из письма отправленного на Ваш Email для подтверждения почты!')}}

            <div class="pt-4">
               {{__('Или введите код подтверждения')}} 

               <x-form class="pt-3" action="{{route('email.confirm',$email->uuid)}}" method="post">

                <div class="grid grid-cols-5 gap-x-4">
                    <div class="col-span-3">
                        <x-form.text name="code" placeholder="12345" inputmode="decimal" autofocus/>
                    </div>

                    <div class="col-span-2">
                        <x-button type="submit">
                            {{__('Подтвердить')}}
                        </x-button>
                    </div>
                </div>
               </x-form>
            </div>
        </x-card.body>
    </x-card>
    
    @unless(session('email-confirmation-sent'))    
  
    <x-slot:crosslink>
        
    <x-link href="#" x-data x-on:click.prevent="$refs.form.submit()">
        
        {{__('Отправить письмо еще раз ...')}}

        <x-form x-ref="form" action="{{route('email.send',$email->uuid)}}" method="post" class="d-none"/>
    </x-link>
        
    </x-slot:crosslink>
    @endunless
 
    </x-layouts.auth>
    
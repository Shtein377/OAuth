@props(['type'=>'text',

        'name'=>'',

        'value'=>'',


])

<input name="{{$name}}" type="{{$type}}" value="{{old($name,$value)}}" {{$attributes}} class="form-input block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-grey-300 pl-[14px] focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

<x-form.error name="{{$name}}"/>
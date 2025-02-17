{{-- @props([
    'href' => '',
    'type' => 'button',
    'color' => 'indigo',
])

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->class([
            'button flex w-full justify-center rounded-md',
            'bg-indigo-600',
            'px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm',
        
            'hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' =>
                $color === 'indigo',
        ]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }}
        class="button flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ $slot }}
    </button>
@endif --}}


@props([
    'type' => 'button', // button, submit
    'color' => 'indigo', // indigo, white, red
    'href' => '',
])

@php
    $attributes = $attributes->class([
        'button flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm',
        'focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2',
        'bg-white hover:bg-gray-50 text-gray-900 ring-1 ring-inset ring-gray-300' => $color === 'white',
        'bg-indigo-600 hover:bg-indigo-500 text-white focus-visible:outline-indigo-600' => $color === 'indigo',
        'bg-red-600 hover:bg-red-500 text-white focus-visible:outline-red-600' => $color === 'red',
    ]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif

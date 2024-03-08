@php
    $class =
        'underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md  dark:focus:ring-offset-gray-800';
@endphp


@props(['fhref', 'shref', 'first', 'second'])

<div class='flex justify-between items-center w-full my-5'>
    <a {{ $attributes->merge(['class' => $class, 'href' => $fhref]) }}>
        {{ $first }}
    </a>
    <a {{ $attributes->merge(['class' => $class, 'href' => $shref]) }}>
        {{ $second }}
    </a>
</div>

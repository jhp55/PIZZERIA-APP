@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-yellow-400 text-start text-base font-medium text-yellow-500 bg-indigo-50 focus:outline-none focus:text-yellow-500 focus:bg-indigo-100 focus:border-yellow-500 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-yellow-300 hover:text-yellow-500 hover:bg-yellow-100 hover:border-gray-300 focus:outline-none focus:text-stone-500 focus:bg-amber-200 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

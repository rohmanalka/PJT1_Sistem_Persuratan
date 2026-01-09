@props(['route'])

@php
    $active = request()->routeIs($route . '*');
@endphp

<a href="{{ route($route) }}"
    class="block px-3 py-2 rounded
    {{ $active ? 'bg-blue-100 text-blue-700 font-medium' : 'hover:bg-gray-100' }}">
    {{ $slot }}
</a>

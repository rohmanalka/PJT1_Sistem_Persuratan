@props(['route', 'icon'])

@php
    $active = request()->routeIs($route);
@endphp

<a wire:navigate href="{{ route($route) }}"
    class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200
        {{ $active ? 'bg-indigo-50 shadow-lg font-semibold' : 'hover:text-indigo-600 font-semibold' }}">

    <i class="{{ $icon }} text-lg"></i>
    <span>{{ $slot }}</span>
</a>

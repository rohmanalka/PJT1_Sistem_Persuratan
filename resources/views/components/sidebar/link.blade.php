@props(['route', 'icon'])

@php
    $active = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
    class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200
          {{ $active
              ? 'bg-indigo-50 text-indigo-700 shadow-lg font-bold'
              : 'text-indigo-700 hover:text-indigo-300 font-semibold' }}">

    <i class="{{ $icon }} text-lg"></i>

    <span>{{ $slot }}</span>
</a>

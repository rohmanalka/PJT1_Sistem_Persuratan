@php
    $routeName = request()->route()?->getName();
    $segments = $routeName ? explode('.', $routeName) : [];
@endphp

@if ($segments)
    <nav class="bg-gray-50 px-6 py-2 text-sm text-gray-600">
        <ol class="flex space-x-2">
            @foreach ($segments as $segment)
                <li class="{{ $loop->last ? 'font-medium' : '' }}">
                    {{ ucfirst(str_replace('-', ' ', $segment)) }}
                    @if (!$loop->last)
                        /
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif

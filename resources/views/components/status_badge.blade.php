@props(['status'])

@php
    $classes = match($status) {
        'draft'    => 'bg-gray-200 text-gray-700',
        'pending'  => 'bg-yellow-200 text-yellow-800',
        'approved' => 'bg-green-200 text-green-800',
        'rejected' => 'bg-red-200 text-red-800',
        default    => 'bg-gray-100 text-gray-600',
    };
@endphp

<span class="px-2 py-1 rounded text-sm font-sm {{ $classes }}">
    {{ ucfirst($status) }}
</span>

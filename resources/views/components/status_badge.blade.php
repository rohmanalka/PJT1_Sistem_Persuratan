@props(['status'])

@php
    $map = [
        'draft' => [
            'label' => 'Draft',
            'class' => 'bg-gray-100 text-gray-700 ring-gray-300',
        ],
        'pending' => [
            'label' => 'Pending',
            'class' => 'bg-yellow-100 text-yellow-800 ring-yellow-300',
        ],
        'approved' => [
            'label' => 'Approved',
            'class' => 'bg-green-100 text-green-800 ring-green-300',
        ],
        'rejected' => [
            'label' => 'Rejected',
            'class' => 'bg-red-100 text-red-800 ring-red-300',
        ],
    ];

    $style = $map[$status] ?? [
        'label' => ucfirst($status),
        'class' => 'bg-gray-100 text-gray-600 ring-gray-300',
    ];
@endphp

<span
    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ring-1 ring-inset
        {{ $style['class'] }}">
    {{ $style['label'] }}
</span>

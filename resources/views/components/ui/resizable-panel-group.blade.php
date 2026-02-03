@props([
    'direction' => 'horizontal',
    'class' => '',
])

@php
    $directionClass = $direction === 'vertical' ? 'flex-col' : 'flex-row';
@endphp

<div
    data-resizable-panel-group
    data-direction="{{ $direction }}"
    class="flex h-full w-full {{ $directionClass }} {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

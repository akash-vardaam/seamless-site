@props([
    'showIcon' => false,
    'class' => '',
])

@php
    $width = rand(50, 90);
@endphp

<div
    data-sidebar="menu-skeleton"
    class="flex h-8 items-center gap-2 rounded-md px-2 {{ $class }}"
    {{ $attributes }}
>
    @if($showIcon)
        <x-ui.skeleton class="size-4 rounded-md" />
    @endif
    <x-ui.skeleton 
        class="h-4 flex-1"
        style="width: {{ $width }}%"
    />
</div>

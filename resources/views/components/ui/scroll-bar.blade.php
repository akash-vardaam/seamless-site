@props([
    'orientation' => 'vertical',
    'class' => '',
])

@php
    $baseClasses = 'flex touch-none select-none transition-colors';
    
    $orientationClasses = $orientation === 'horizontal'
        ? 'h-2.5 flex-col border-t border-t-transparent p-[1px]'
        : 'h-full w-2.5 border-l border-l-transparent p-[1px]';
@endphp

<div
    data-scroll-bar
    data-orientation="{{ $orientation }}"
    class="{{ $baseClasses }} {{ $orientationClasses }} {{ $class }}"
    {{ $attributes }}
>
    <div class="relative flex-1 rounded-full bg-border hover:bg-foreground/50 transition-colors"></div>
</div>

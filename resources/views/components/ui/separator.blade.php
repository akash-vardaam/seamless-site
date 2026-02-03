@props([
    'orientation' => 'horizontal',
    'decorative' => true,
    'class' => '',
])

@php
    $orientationClasses = $orientation === 'vertical' 
        ? 'h-full w-[1px]' 
        : 'h-[1px] w-full';
@endphp

<div
    role="{{ $decorative ? 'separator' : 'presentation' }}"
    class="shrink-0 bg-border {{ $orientationClasses }} {{ $class }}"
    aria-orientation="{{ $orientation }}"
    {{ $attributes }}
>
</div>

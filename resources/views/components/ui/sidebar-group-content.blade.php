@props([
    'class' => '',
])

<div
    data-sidebar="group-content"
    class="w-full text-sm {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

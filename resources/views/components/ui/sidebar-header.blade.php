@props([
    'class' => '',
])

<div
    data-sidebar="header"
    class="flex flex-col gap-2 p-2 {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

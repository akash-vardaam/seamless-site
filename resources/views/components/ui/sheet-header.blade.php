@props([
    'class' => '',
])

<div
    data-sheet-header
    class="flex flex-col space-y-2 text-center sm:text-left {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

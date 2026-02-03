@props([
    'selectId' => null,
    'class' => '',
])

<div
    data-select-separator
    data-select-id="{{ $selectId }}"
    class="my-1 h-px bg-muted {{ $class }}"
    {{ $attributes }}
>
</div>

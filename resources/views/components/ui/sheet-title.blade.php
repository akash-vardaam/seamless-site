@props([
    'class' => '',
])

<h2
    data-sheet-title
    class="text-lg font-semibold text-foreground {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</h2>

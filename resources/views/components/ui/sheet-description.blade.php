@props([
    'class' => '',
])

<p
    data-sheet-description
    class="text-sm text-muted-foreground {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</p>

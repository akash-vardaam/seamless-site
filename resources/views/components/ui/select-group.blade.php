@props([
    'label' => '',
    'class' => '',
])

<div
    data-select-group
    class="{{ $class }}"
    {{ $attributes }}
>
    @if($label)
        <div data-select-label class="py-1.5 pl-8 pr-2 text-sm font-semibold text-foreground">
            {{ $label }}
        </div>
    @endif
    
    {{ $slot }}
</div>

@props([
    'isActive' => false,
    'variant' => 'default',
    'size' => 'default',
    'tooltip' => null,
    'class' => '',
])

@php
    $baseClasses = 'peer/menu-button flex w-full items-center gap-2 overflow-hidden rounded-md p-2 text-left text-sm
        outline-none ring-sidebar-ring transition-[width,height,padding]
        hover:bg-sidebar-accent hover:text-sidebar-accent-foreground
        focus-visible:ring-2 active:bg-sidebar-accent active:text-sidebar-accent-foreground
        disabled:pointer-events-none disabled:opacity-50
        group-has-[[data-sidebar=menu-action]]/menu-item:pr-8
        data-[active=true]:bg-sidebar-accent data-[active=true]:font-medium data-[active=true]:text-sidebar-accent-foreground
        group-data-[collapsible=icon]:!size-8 group-data-[collapsible=icon]:!p-2
        [&>span:last-child]:truncate [&>svg]:size-4 [&>svg]:shrink-0';
    
    $sizeClasses = match($size) {
        'sm' => 'h-7 text-xs',
        'lg' => 'h-12 text-sm',
        default => 'h-8 text-sm',
    };
@endphp

<button
    data-sidebar="menu-button"
    data-active="{{ $isActive ? 'true' : 'false' }}"
    data-size="{{ $size }}"
    class="{{ $baseClasses }} {{ $sizeClasses }} {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</button>

@if($tooltip)
    <div class="absolute left-full ml-2 hidden px-2 py-1 bg-sidebar-accent text-sidebar-accent-foreground text-xs rounded
        group-data-[collapsible=icon]:block group-data-[collapsible=icon]:group-hover/menu-item:block
        whitespace-nowrap pointer-events-none">
        {{ is_array($tooltip) ? $tooltip['label'] ?? $tooltip : $tooltip }}
    </div>
@endif

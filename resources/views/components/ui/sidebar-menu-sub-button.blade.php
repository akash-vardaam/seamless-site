@props([
    'href' => '#',
    'size' => 'md',
    'isActive' => false,
    'class' => '',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'h-7 text-xs',
        default => 'text-sm',
    };
@endphp

<a
    href="{{ $href }}"
    data-sidebar="menu-sub-button"
    data-size="{{ $size }}"
    data-active="{{ $isActive ? 'true' : 'false' }}"
    class="flex h-7 min-w-0 -translate-x-px items-center gap-2 overflow-hidden rounded-md px-2
        text-sidebar-foreground outline-none ring-sidebar-ring
        aria-disabled:pointer-events-none aria-disabled:opacity-50
        hover:bg-sidebar-accent hover:text-sidebar-accent-foreground
        focus-visible:ring-2 active:bg-sidebar-accent active:text-sidebar-accent-foreground
        disabled:pointer-events-none disabled:opacity-50
        data-[active=true]:bg-sidebar-accent data-[active=true]:text-sidebar-accent-foreground
        [&>span:last-child]:truncate [&>svg]:size-4 [&>svg]:shrink-0 [&>svg]:text-sidebar-accent-foreground
        group-data-[collapsible=icon]:hidden
        {{ $sizeClasses }} {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>

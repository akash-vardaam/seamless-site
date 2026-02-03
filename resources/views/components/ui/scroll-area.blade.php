@props([
    'class' => '',
])

<div
    data-scroll-area
    class="relative overflow-hidden {{ $class }}"
    {{ $attributes }}
>
    <div
        data-scroll-area-viewport
        class="h-full w-full rounded-[inherit] overflow-y-auto overflow-x-hidden"
    >
        {{ $slot }}
    </div>
    
    <!-- Scrollbar styling via CSS -->
    <style>
        [data-scroll-area-viewport]::-webkit-scrollbar {
            width: 0.625rem;
            height: 0.625rem;
        }
        
        [data-scroll-area-viewport]::-webkit-scrollbar-track {
            background: transparent;
            border-left: 1px solid transparent;
        }
        
        [data-scroll-area-viewport]::-webkit-scrollbar-thumb {
            background-color: hsl(var(--border));
            border-radius: 9999px;
            border: 1px solid transparent;
        }
        
        [data-scroll-area-viewport]::-webkit-scrollbar-thumb:hover {
            background-color: hsl(var(--foreground) / 0.6);
        }
        
        /* Firefox */
        [data-scroll-area-viewport] {
            scrollbar-width: thin;
            scrollbar-color: hsl(var(--border)) transparent;
        }
    </style>
</div>

@props([
    'selectId' => null,
    'class' => '',
])

<div
    data-select-content
    data-select-id="{{ $selectId }}"
    data-open="false"
    class="absolute top-full left-0 z-50 mt-2 w-full min-w-[8rem] rounded-md border bg-popover text-popover-foreground shadow-md
        overflow-hidden transition-all duration-200
        data-[open=false]:opacity-0 data-[open=false]:pointer-events-none data-[open=false]:scale-95
        data-[open=true]:opacity-100 data-[open=true]:scale-100
        {{ $class }}"
    {{ $attributes }}
>
    <!-- Scroll up button -->
    <button
        type="button"
        data-select-scroll-up
        class="flex cursor-default items-center justify-center py-1 w-full hover:bg-accent"
        onclick="event.stopPropagation()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>
    
    <!-- Viewport -->
    <div data-select-viewport class="overflow-y-auto max-h-96 p-1">
        {{ $slot }}
    </div>
    
    <!-- Scroll down button -->
    <button
        type="button"
        data-select-scroll-down
        class="flex cursor-default items-center justify-center py-1 w-full hover:bg-accent"
        onclick="event.stopPropagation()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </button>
</div>

<script>
    (function() {
        const content = document.querySelector('[data-select-content][data-select-id="{{ $selectId }}"]');
        const root = document.querySelector('[data-select-id="{{ $selectId }}"]');
        
        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!root.contains(e.target)) {
                content.dataset.open = 'false';
            }
        });
        
        // Handle scroll buttons
        const viewport = content.querySelector('[data-select-viewport]');
        content.querySelector('[data-select-scroll-up]').addEventListener('click', () => {
            viewport.scrollTop -= 40;
        });
        content.querySelector('[data-select-scroll-down]').addEventListener('click', () => {
            viewport.scrollTop += 40;
        });
    })();
</script>

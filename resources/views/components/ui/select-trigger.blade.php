@props([
    'selectId' => null,
    'placeholder' => 'Select an option...',
    'class' => '',
])

<button
    type="button"
    data-select-trigger
    data-select-id="{{ $selectId }}"
    class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm
        ring-offset-background placeholder:text-muted-foreground
        focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2
        disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1
        {{ $class }}"
    onclick="window.selectApi?.[this.dataset.selectId]?.open?.()"
    {{ $attributes }}
>
    <span data-select-value-display class="text-muted-foreground">
        {{ $placeholder }}
    </span>
    
    <!-- Chevron icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-50">
        <polyline points="6 9 12 15 18 9"></polyline>
    </svg>
</button>

<script>
    (function() {
        const trigger = document.querySelector('[data-select-trigger][data-select-id="{{ $selectId }}"]');
        const root = document.querySelector('[data-select-id="{{ $selectId }}"]');
        
        if (!window.selectApi['{{ $selectId }}']) window.selectApi['{{ $selectId }}'] = {};
        
        window.selectApi['{{ $selectId }}'].open = function() {
            const menu = root.querySelector('[data-select-content]');
            if (menu) menu.dataset.open = 'true';
        };
        
        window.selectApi['{{ $selectId }}'].close = function() {
            const menu = root.querySelector('[data-select-content]');
            if (menu) menu.dataset.open = 'false';
        };
        
        window.selectApi['{{ $selectId }}'].updateDisplay = function(text) {
            const display = trigger.querySelector('[data-select-value-display]');
            if (display) display.textContent = text;
        };
    })();
</script>

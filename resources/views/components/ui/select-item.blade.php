@props([
    'value' => '',
    'selectId' => null,
    'disabled' => false,
    'class' => '',
])

<div
    data-select-item
    data-value="{{ $value }}"
    data-select-id="{{ $selectId }}"
    data-disabled="{{ $disabled ? 'true' : 'false' }}"
    class="relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm
        outline-none transition-colors
        hover:bg-accent hover:text-accent-foreground
        focus:bg-accent focus:text-accent-foreground
        data-[disabled=true]:pointer-events-none data-[disabled=true]:opacity-50
        {{ $class }}"
    onclick="if (!this.dataset.disabled) window.selectApi?.[this.dataset.selectId]?.selectItem?.(this.dataset.value, this.textContent.trim())"
    {{ $attributes }}
>
    <!-- Check indicator -->
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-0 data-[selected=true]:opacity-100" data-select-check>
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
    </span>

    {{ $slot }}
</div>

<script>
    (function() {
        const item = document.querySelector('[data-select-item][data-value="{{ $value }}"][data-select-id="{{ $selectId }}"]');
        
        if (!window.selectApi['{{ $selectId }}']) window.selectApi['{{ $selectId }}'] = {};
        if (!window.selectApi['{{ $selectId }}'].selectItem) {
            window.selectApi['{{ $selectId }}'].selectItem = function(val, label) {
                const root = document.querySelector('[data-select-id="{{ $selectId }}"]');
                const items = root.querySelectorAll('[data-select-item]');
                
                // Uncheck all
                items.forEach(i => {
                    i.querySelector('[data-select-check]').dataset.selected = 'false';
                    i.dataset.selected = 'false';
                });
                
                // Check selected
                const selected = document.querySelector(`[data-select-item][data-value="${val}"][data-select-id="{{ $selectId }}"]`);
                if (selected) {
                    selected.querySelector('[data-select-check]').dataset.selected = 'true';
                    selected.dataset.selected = 'true';
                }
                
                // Update native select
                const nativeSelect = root.querySelector('[data-select-native]');
                nativeSelect.value = val;
                root.dataset.selectValue = val;
                
                // Update display
                window.selectApi['{{ $selectId }}'].updateDisplay(label);
                
                // Close menu
                window.selectApi['{{ $selectId }}'].close();
                
                // Dispatch event
                root.dispatchEvent(new CustomEvent('select-change', { detail: { value: val, label } }));
            };
        }
    })();
</script>

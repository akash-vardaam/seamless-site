@props([
    'name' => '',
    'id' => null,
    'min' => 0,
    'max' => 100,
    'value' => 50,
    'step' => 1,
    'disabled' => false,
])

@php
    $id = $id ?: 'slider-' . uniqid();
@endphp

<div class="relative flex w-full touch-none select-none items-center group" data-slider-container>
    <!-- Track background -->
    <div class="relative h-2 w-full rounded-full bg-secondary overflow-hidden">
        <!-- Range fill -->
        <div 
            class="absolute h-full bg-primary transition-all rounded-full"
            data-slider-range
            style="width: {{ (($value - $min) / ($max - $min)) * 100 }}%"
        ></div>
    </div>
    
    <!-- Range input (hidden, for functionality) -->
    <input
        type="range"
        id="{{ $id }}"
        name="{{ $name }}"
        min="{{ $min }}"
        max="{{ $max }}"
        value="{{ $value }}"
        step="{{ $step }}"
        {{ $disabled ? 'disabled' : '' }}
        class="absolute w-full h-5 top-1/2 -translate-y-1/2 appearance-none bg-transparent cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 z-10"
        data-slider-input
        style="
            -webkit-appearance: none;
            -moz-appearance: none;
        "
    />
</div>

<style>
    /* Chrome/Safari/Edge */
    input[data-slider-input]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 9999px;
        border: 2px solid #3b82f6;
        background: var(--background, #ffffff);
        cursor: pointer;
        transition: color 0.15s ease-in-out;
        box-shadow: 0 0 0 var(--ring-offset-width, 0px) var(--ring-offset-background, #ffffff),
                    0 0 0 calc(2px + var(--ring-offset-width, 0px)) transparent;
    }
    
    input[data-slider-input]::-webkit-slider-thumb:focus {
        outline: none;
        box-shadow: 0 0 0 2px #ffffff,
                    0 0 0 4px #3b82f6;
    }
    
    input[data-slider-input]::-webkit-slider-thumb:disabled {
        pointer-events: none;
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    /* Firefox */
    input[data-slider-input]::-moz-range-thumb {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 9999px;
        border: 2px solid #3b82f6;
        background: var(--background, #ffffff);
        cursor: pointer;
        transition: color 0.15s ease-in-out;
        box-shadow: 0 0 0 2px #ffffff,
                    0 0 0 4px transparent;
    }
    
    input[data-slider-input]::-moz-range-thumb:focus {
        outline: none;
        box-shadow: 0 0 0 2px #ffffff,
                    0 0 0 4px #3b82f6;
    }
    
    input[data-slider-input]::-moz-range-thumb:disabled {
        pointer-events: none;
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    input[data-slider-input]::-moz-range-track {
        background: transparent;
        border: none;
    }
    
    input[data-slider-input]::-moz-range-progress {
        background: #3b82f6;
        height: 0.5rem;
        border-radius: 9999px;
    }
</style>

<script>
    (function() {
        const container = document.querySelector('[data-slider-container]');
        const input = container.querySelector('[data-slider-input]');
        const range = container.querySelector('[data-slider-range]');
        
        function updateRange() {
            const min = parseFloat(input.min);
            const max = parseFloat(input.max);
            const value = parseFloat(input.value);
            const percentage = ((value - min) / (max - min)) * 100;
            range.style.width = percentage + '%';
            
            // Dispatch custom event
            input.dispatchEvent(new CustomEvent('sliderchange', {
                detail: { value: value }
            }));
        }
        
        input.addEventListener('input', updateRange);
        updateRange();
    })();
</script>

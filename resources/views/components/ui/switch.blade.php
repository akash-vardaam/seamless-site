@props([
    'name' => '',
    'checked' => false,
    'disabled' => false,
    'id' => null,
])

@php
    $id = $id ?: 'switch-' . uniqid();
@endphp

<div class="inline-flex items-center">
    <input 
        type="checkbox" 
        id="{{ $id }}" 
        name="{{ $name }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="sr-only peer"
        data-switch
    />
    
    <label 
        for="{{ $id }}"
        class="peer inline-flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent transition-colors peer-checked:bg-primary peer-unchecked:bg-input focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-ring peer-focus-visible:ring-offset-2 peer-focus-visible:ring-offset-background peer-disabled:cursor-not-allowed peer-disabled:opacity-50"
        :class="{ 'cursor-not-allowed opacity-50': $disabled }"
    >
        <span 
            class="pointer-events-none block h-5 w-5 rounded-full bg-background shadow-lg ring-0 transition-transform peer-checked:translate-x-5 peer-unchecked:translate-x-0"
            :class="{ 'translate-x-5': $checked, 'translate-x-0': !$checked }"
        />
    </label>
</div>

<script>
    (function() {
        const switches = document.querySelectorAll('[data-switch]');
        switches.forEach(switchEl => {
            const label = switchEl.nextElementSibling;
            const span = label.querySelector('span');
            
            function updateState() {
                if (switchEl.checked) {
                    span.classList.remove('translate-x-0');
                    span.classList.add('translate-x-5');
                } else {
                    span.classList.remove('translate-x-5');
                    span.classList.add('translate-x-0');
                }
            }
            
            switchEl.addEventListener('change', updateState);
            label.addEventListener('click', (e) => {
                if (!switchEl.disabled) {
                    switchEl.checked = !switchEl.checked;
                    switchEl.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
            
            // Initial state
            updateState();
        });
    })();
</script>

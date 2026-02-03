@props([
    'name' => '',
    'value' => '',
    'id' => null,
])

@php
    $id = $id ?: 'select-' . uniqid();
@endphp

<div 
    data-select-root
    data-select-id="{{ $id }}"
    data-select-value="{{ $value }}"
    {{ $attributes }}
>
    <!-- Hidden native select for form submission -->
    <select 
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        class="sr-only"
        data-select-native
    >
        {{ $slot }}
    </select>
    
    <!-- Custom select wrapper -->
    <div data-select-wrapper></div>
</div>

<script>
    (function() {
        const root = document.querySelector('[data-select-id="{{ $id }}"]');
        const nativeSelect = root.querySelector('[data-select-native]');
        const wrapper = root.querySelector('[data-select-wrapper]');
        
        window.selectApi = window.selectApi || {};
        window.selectApi['{{ $id }}'] = {
            getValue: () => nativeSelect.value,
            setValue: (val) => {
                nativeSelect.value = val;
                root.dataset.selectValue = val;
                root.dispatchEvent(new CustomEvent('select-change', { detail: { value: val } }));
            },
            getOptions: () => Array.from(nativeSelect.options),
        };
    })();
</script>

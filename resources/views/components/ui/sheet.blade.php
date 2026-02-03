@props([
    'open' => false,
    'id' => null,
])

@php
    $id = $id ?: 'sheet-' . uniqid();
@endphp

<div 
    data-sheet-root
    data-sheet-id="{{ $id }}"
    data-sheet-open="{{ $open ? 'true' : 'false' }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

<script>
    (function() {
        const root = document.querySelector('[data-sheet-id="{{ $id }}"]');
        
        window.sheetApi = window.sheetApi || {};
        window.sheetApi['{{ $id }}'] = {
            open: () => {
                root.dataset.sheetOpen = 'true';
                root.dispatchEvent(new CustomEvent('sheet-open'));
            },
            close: () => {
                root.dataset.sheetOpen = 'false';
                root.dispatchEvent(new CustomEvent('sheet-close'));
            },
            toggle: () => {
                const isOpen = root.dataset.sheetOpen === 'true';
                isOpen ? window.sheetApi['{{ $id }}'].close() : window.sheetApi['{{ $id }}'].open();
            },
        };
    })();
</script>

@props([
    'sheetId' => null,
    'side' => 'right',
    'class' => '',
])

@php
    $sideClasses = match($side) {
        'top' => 'inset-x-0 top-0 border-b data-[state=closed]:slide-out-to-top data-[state=open]:slide-in-from-top',
        'bottom' => 'inset-x-0 bottom-0 border-t data-[state=closed]:slide-out-to-bottom data-[state=open]:slide-in-from-bottom',
        'left' => 'inset-y-0 left-0 h-full w-3/4 border-r data-[state=closed]:slide-out-to-left data-[state=open]:slide-in-from-left sm:max-w-sm',
        'right' => 'inset-y-0 right-0 h-full w-3/4 border-l data-[state=closed]:slide-out-to-right data-[state=open]:slide-in-from-right sm:max-w-sm',
        default => 'inset-y-0 right-0 h-full w-3/4 border-l sm:max-w-sm',
    };
@endphp

<div
    data-sheet-overlay
    data-sheet-id="{{ $sheetId }}"
    class="fixed inset-0 z-50 bg-black/80 opacity-0 pointer-events-none transition-opacity duration-300
        data-[sheet-open=true]:opacity-100 data-[sheet-open=true]:pointer-events-auto"
    onclick="event.target === this && window.sheetApi?.[this.dataset.sheetId]?.close?.()"
/>

<div
    data-sheet-content
    data-sheet-id="{{ $sheetId }}"
    data-side="{{ $side }}"
    class="fixed z-50 gap-4 bg-background p-6 shadow-lg transition ease-in-out duration-300
        {{ $sideClasses }}
        data-[sheet-open=false]:pointer-events-none data-[sheet-open=false]:opacity-0
        data-[sheet-open=true]:opacity-100 data-[sheet-open=true]:pointer-events-auto
        {{ $class }}"
    {{ $attributes }}
>
    <!-- Close button -->
    <x-ui.sheet-close 
        :sheetId="$sheetId"
        class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity
            hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2
            disabled:pointer-events-none"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
            <path d="M18 6l-12 12M6 6l12 12"></path>
        </svg>
        <span class="sr-only">Close</span>
    </x-ui.sheet-close>
    
    {{ $slot }}
</div>

<script>
    (function() {
        const sheetId = '{{ $sheetId }}';
        const overlay = document.querySelector(`[data-sheet-overlay][data-sheet-id="${sheetId}"]`);
        const content = document.querySelector(`[data-sheet-content][data-sheet-id="${sheetId}"]`);
        const root = document.querySelector(`[data-sheet-id="${sheetId}"][data-sheet-root]`) || document.querySelector(`[data-sheet-id="${sheetId}"]`);
        
        function updateState() {
            const isOpen = root.dataset.sheetOpen === 'true';
            if (overlay) overlay.dataset.sheetOpen = isOpen;
            if (content) content.dataset.sheetOpen = isOpen;
        }
        
        if (root) {
            root.addEventListener('sheet-open', updateState);
            root.addEventListener('sheet-close', updateState);
        }
        
        updateState();
    })();
</script>

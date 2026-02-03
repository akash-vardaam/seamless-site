@props([
    'withHandle' => false,
    'class' => '',
])

<div
    data-resizable-handle
    data-with-handle="{{ $withHandle ? 'true' : 'false' }}"
    class="relative flex w-px items-center justify-center bg-border
        after:absolute after:inset-y-0 after:left-1/2 after:w-1 after:-translate-x-1/2
        hover:bg-primary/20 transition-colors
        focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring focus-visible:ring-offset-1
        [&[data-direction=vertical]]:h-px [&[data-direction=vertical]]:w-full
        [&[data-direction=vertical]]:after:left-0 [&[data-direction=vertical]]:after:h-1 [&[data-direction=vertical]]:after:w-full
        [&[data-direction=vertical]]:after:-translate-y-1/2 [&[data-direction=vertical]]:after:translate-x-0
        {{ $class }}"
    draggable="true"
    {{ $attributes }}
>
    @if($withHandle)
        <div class="z-10 flex h-4 w-3 items-center justify-center rounded-sm border bg-border hover:bg-primary/30 transition-colors">
            <!-- Grip icon (3 dots) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-2.5 w-2.5">
                <circle cx="9" cy="5" r="1.5" />
                <circle cx="9" cy="12" r="1.5" />
                <circle cx="9" cy="19" r="1.5" />
                <circle cx="15" cy="5" r="1.5" />
                <circle cx="15" cy="12" r="1.5" />
                <circle cx="15" cy="19" r="1.5" />
            </svg>
        </div>
    @endif
</div>

<script>
    (function() {
        const handles = document.querySelectorAll('[data-resizable-handle]');
        
        handles.forEach(handle => {
            let isResizing = false;
            let startX = 0;
            let startY = 0;
            let startLeftWidth = 0;
            
            handle.addEventListener('mousedown', (e) => {
                isResizing = true;
                startX = e.clientX;
                startY = e.clientY;
                
                const group = handle.closest('[data-resizable-panel-group]');
                const panels = group.querySelectorAll('[data-resizable-panel]');
                if (panels.length >= 2) {
                    startLeftWidth = panels[0].offsetWidth;
                }
                
                document.body.style.userSelect = 'none';
            });
            
            document.addEventListener('mousemove', (e) => {
                if (!isResizing) return;
                
                const group = handle.closest('[data-resizable-panel-group]');
                const direction = group.dataset.direction;
                const panels = group.querySelectorAll('[data-resizable-panel]');
                
                if (panels.length < 2) return;
                
                const leftPanel = panels[0];
                const rightPanel = panels[1];
                const delta = direction === 'vertical' ? e.clientY - startY : e.clientX - startX;
                const newLeftWidth = startLeftWidth + delta;
                const totalWidth = group.offsetWidth - (direction === 'vertical' ? 0 : group.offsetWidth * 0.04);
                const percentage = (newLeftWidth / totalWidth) * 100;
                
                // Constrain to min/max
                const minSize = parseFloat(leftPanel.dataset.minSize) || 25;
                const maxSize = parseFloat(leftPanel.dataset.maxSize) || 75;
                
                if (percentage >= minSize && percentage <= maxSize) {
                    leftPanel.style.flex = `${percentage} 1 0%`;
                    rightPanel.style.flex = `${100 - percentage} 1 0%`;
                }
            });
            
            document.addEventListener('mouseup', () => {
                isResizing = false;
                document.body.style.userSelect = '';
            });
        });
    })();
</script>

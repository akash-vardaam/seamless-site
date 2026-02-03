@props([
    'side' => 'left',
    'variant' => 'sidebar',
    'collapsible' => 'offcanvas',
    'class' => '',
])

<div
    class="group peer hidden text-sidebar-foreground md:flex md:flex-col {{ $class }}"
    data-sidebar="root"
    data-side="{{ $side }}"
    data-variant="{{ $variant }}"
    data-collapsible="{{ $collapsible }}"
    {{ $attributes }}
>
    <!-- Sidebar gap placeholder for desktop -->
    <div
        class="relative h-svh w-[--sidebar-width] bg-transparent transition-[width] duration-200 ease-linear
            group-data-[collapsible=offcanvas]:w-0
            group-data-[side=right]:rotate-180
            {{ $variant === 'floating' || $variant === 'inset' 
                ? 'group-data-[collapsible=icon]:w-[calc(var(--sidebar-width-icon)_+_theme(spacing.4))]'
                : 'group-data-[collapsible=icon]:w-[--sidebar-width-icon]'
            }}"
    />
    
    <!-- Sidebar content container -->
    <div
        class="fixed inset-y-0 z-10 hidden h-svh w-[--sidebar-width] transition-[left,right,width] duration-200 ease-linear md:flex flex-col
            {{ $side === 'left' 
                ? 'left-0 group-data-[collapsible=offcanvas]:left-[calc(var(--sidebar-width)*-1)]'
                : 'right-0 group-data-[collapsible=offcanvas]:right-[calc(var(--sidebar-width)*-1)]'
            }}
            {{ $variant === 'floating' || $variant === 'inset'
                ? 'p-2 group-data-[collapsible=icon]:w-[calc(var(--sidebar-width-icon)_+_theme(spacing.4)_+2px)]'
                : 'group-data-[collapsible=icon]:w-[--sidebar-width-icon] group-data-[side=left]:border-r group-data-[side=right]:border-l'
            }}"
        data-sidebar="container"
    >
        <div
            class="flex h-full w-full flex-col bg-sidebar rounded-lg
                {{ $variant === 'floating' ? 'border border-sidebar-border shadow' : '' }}"
            data-sidebar="content-wrapper"
        >
            {{ $slot }}
        </div>
    </div>
</div>

<!-- Mobile sidebar (Sheet) -->
<div
    class="fixed inset-0 z-40 md:hidden"
    data-sidebar="mobile"
    data-open="false"
    data-sidebar-sheet
>
    <!-- Overlay -->
    <div
        class="absolute inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-200
            data-[open=true]:opacity-100 data-[open=true]:pointer-events-auto"
        data-sidebar="overlay"
    />
    
    <!-- Mobile sidebar panel -->
    <div
        class="absolute inset-y-0 {{ $side === 'left' ? 'left-0' : 'right-0' }} w-[--sidebar-width-mobile] bg-sidebar text-sidebar-foreground
            transition-transform duration-200 ease-linear
            {{ $side === 'left' ? '-translate-x-full data-[open=true]:translate-x-0' : 'translate-x-full data-[open=true]:translate-x-0' }}"
        data-sidebar="mobile-content"
    >
        {{ $slot }}
    </div>
</div>

<script>
    (function() {
        const mobileSheet = document.querySelector('[data-sidebar-sheet]');
        const overlay = mobileSheet.querySelector('[data-sidebar="overlay"]');
        
        if (overlay) {
            overlay.addEventListener('click', () => {
                mobileSheet.dataset.open = 'false';
            });
        }
    })();
</script>

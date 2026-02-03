@props([
    'defaultOpen' => true,
    'class' => '',
])

@php
    $sidebarState = $defaultOpen ? 'expanded' : 'collapsed';
    $isMobile = false; // Will be detected via JavaScript
@endphp

<div 
    class="group/sidebar-wrapper flex min-h-svh w-full {{ $class }}"
    data-sidebar-provider
    data-sidebar-state="{{ $sidebarState }}"
    style="
        --sidebar-width: 16rem;
        --sidebar-width-icon: 3rem;
        --sidebar-width-mobile: 18rem;
    "
    {{ $attributes }}
>
    {{ $slot }}
</div>

<script>
    (function() {
        const SIDEBAR_COOKIE_NAME = 'sidebar:state';
        const SIDEBAR_COOKIE_MAX_AGE = 60 * 60 * 24 * 7;
        const SIDEBAR_KEYBOARD_SHORTCUT = 'b';
        
        const provider = document.querySelector('[data-sidebar-provider]');
        if (!provider) return;
        
        // Detect mobile
        const isMobile = () => window.innerWidth < 768;
        
        // Initialize state from cookie
        function getInitialState() {
            const cookie = document.cookie
                .split('; ')
                .find(row => row.startsWith(SIDEBAR_COOKIE_NAME + '='));
            return cookie ? cookie.split('=')[1] === 'true' : true;
        }
        
        // Initialize sidebar state
        let open = getInitialState();
        
        function setState(newState) {
            open = newState;
            provider.dataset.sidebarState = open ? 'expanded' : 'collapsed';
            document.cookie = `${SIDEBAR_COOKIE_NAME}=${open}; path=/; max-age=${SIDEBAR_COOKIE_MAX_AGE}`;
            
            // Dispatch custom event
            provider.dispatchEvent(new CustomEvent('sidebar-state-change', {
                detail: { state: open ? 'expanded' : 'collapsed', open }
            }));
        }
        
        function toggleSidebar() {
            if (isMobile()) {
                // Toggle mobile sheet
                const sheet = provider.querySelector('[data-sidebar-sheet]');
                if (sheet) {
                    const isOpen = sheet.dataset.open === 'true';
                    sheet.dataset.open = !isOpen;
                }
            } else {
                setState(!open);
            }
        }
        
        // Expose global sidebar API
        window.sidebar = {
            toggle: toggleSidebar,
            setState: setState,
            getState: () => open,
        };
        
        // Keyboard shortcut
        document.addEventListener('keydown', (e) => {
            if (e.key === SIDEBAR_KEYBOARD_SHORTCUT && (e.ctrlKey || e.metaKey)) {
                e.preventDefault();
                toggleSidebar();
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            const wasMobile = provider.dataset.wasMobile === 'true';
            const nowMobile = isMobile();
            
            if (wasMobile !== nowMobile) {
                provider.dataset.wasMobile = nowMobile;
            }
        });
        
        provider.dataset.wasMobile = isMobile();
    })();
</script>

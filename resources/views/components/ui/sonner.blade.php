@props([
    'theme' => 'system',
    'position' => 'bottom-right',
    'expand' => false,
    'richColors' => false,
    'duration' => 3000,
])

@php
    $theme = $theme === 'system' ? (request()->cookie('theme') ?? 'light') : $theme;
    $positionClass = match($position) {
        'top-left' => 'top-0 left-0',
        'top-center' => 'top-0 left-1/2 -translate-x-1/2',
        'top-right' => 'top-0 right-0',
        'bottom-left' => 'bottom-0 left-0',
        'bottom-center' => 'bottom-0 left-1/2 -translate-x-1/2',
        'bottom-right' => 'bottom-0 right-0',
        default => 'bottom-0 right-0',
    };
@endphp

<div 
    class="toaster group fixed {{ $positionClass }} z-100 pointer-events-none p-4 gap-2 flex flex-col max-w-md"
    data-sonner-container
    data-theme="{{ $theme }}"
    data-position="{{ $position }}"
>
</div>

<script>
    (function() {
        const container = document.querySelector('[data-sonner-container]');
        const theme = container.dataset.theme;
        const position = container.dataset.position;
        
        // Enhanced toast function with Sonner-like API
        window.sonner = {
            toast: function(message, options = {}) {
                const id = 'sonner-' + Date.now();
                const variant = options.variant || 'default';
                const duration = options.duration !== undefined ? options.duration : 3000;
                const action = options.action;
                const dismiss = options.onDismiss;
                const richColors = document.querySelector('[data-sonner-container]').parentElement?.classList.contains('rich-colors');
                
                // Create toast element
                const toastEl = document.createElement('div');
                toastEl.id = id;
                toastEl.className = `group toast group-[.toaster]:bg-background group-[.toaster]:text-foreground group-[.toaster]:border-border group-[.toaster]:shadow-lg rounded-lg border p-4 pointer-events-auto animate-slideInFromBottom`;
                
                if (richColors && variant !== 'default') {
                    const colorMap = {
                        success: 'bg-green-500 text-white border-green-600',
                        error: 'bg-red-500 text-white border-red-600',
                        warning: 'bg-yellow-500 text-white border-yellow-600',
                        info: 'bg-blue-500 text-white border-blue-600',
                    };
                    toastEl.className = `group toast ${colorMap[variant] || ''} rounded-lg p-4 pointer-events-auto animate-slideInFromBottom`;
                }
                
                let content = `<div class="flex gap-3 items-start justify-between">`;
                content += `<div class="flex-1"><p class="text-sm font-medium">${escapeHtml(message)}</p>`;
                
                if (options.description) {
                    content += `<p class="text-xs text-muted-foreground mt-1">${escapeHtml(options.description)}</p>`;
                }
                content += `</div>`;
                
                if (action) {
                    content += `<button class="ml-4 px-2 py-1 text-xs font-medium bg-primary text-primary-foreground rounded hover:bg-primary/90 transition-colors whitespace-nowrap">${escapeHtml(action.label)}</button>`;
                }
                
                content += `<button class="ml-4 text-muted-foreground hover:text-foreground transition-colors" data-close="true">✕</button>`;
                content += `</div>`;
                
                toastEl.innerHTML = content;
                container.appendChild(toastEl);
                
                // Handle action button
                if (action) {
                    toastEl.querySelector('button:not([data-close])').addEventListener('click', () => {
                        if (action.onClick) action.onClick();
                        removeToast(id);
                    });
                }
                
                // Handle close button
                toastEl.querySelector('[data-close]').addEventListener('click', () => removeToast(id));
                
                // Auto dismiss
                let timeoutId;
                if (duration) {
                    timeoutId = setTimeout(() => removeToast(id), duration);
                }
                
                function removeToast(toastId) {
                    const el = document.getElementById(toastId);
                    if (el) {
                        el.classList.add('animate-slideOutToRight');
                        setTimeout(() => {
                            el.remove();
                            if (dismiss) dismiss();
                        }, 200);
                    }
                    clearTimeout(timeoutId);
                }
                
                return {
                    id,
                    dismiss: () => removeToast(id),
                    update: (newOptions) => {
                        // Update toast content
                        const el = document.getElementById(id);
                        if (el) {
                            // Rebuild with new content
                            el.innerHTML = `<div class="flex gap-3 items-start justify-between">
                                <p class="text-sm font-medium">${escapeHtml(newOptions.message || message)}</p>
                                <button data-close="true" class="text-muted-foreground hover:text-foreground">✕</button>
                            </div>`;
                            el.querySelector('[data-close]').addEventListener('click', () => removeToast(id));
                        }
                    }
                };
            },
            
            // Convenience methods
            success: function(message, options = {}) {
                return window.sonner.toast(message, { ...options, variant: 'success' });
            },
            error: function(message, options = {}) {
                return window.sonner.toast(message, { ...options, variant: 'error' });
            },
            warning: function(message, options = {}) {
                return window.sonner.toast(message, { ...options, variant: 'warning' });
            },
            info: function(message, options = {}) {
                return window.sonner.toast(message, { ...options, variant: 'info' });
            },
            loading: function(message, options = {}) {
                const el = window.sonner.toast(message, { ...options, duration: false });
                el.el = document.getElementById(el.id);
                el.el.innerHTML = `<div class="flex gap-3 items-center">
                    <div class="animate-spin rounded-full h-4 w-4 border-2 border-muted-foreground border-t-foreground"></div>
                    <p class="text-sm">${escapeHtml(message)}</p>
                </div>`;
                return el;
            },
            promise: async function(promise, messages, options = {}) {
                const { loading, success, error } = messages;
                const toastId = window.sonner.loading(loading);
                
                try {
                    const result = await promise;
                    toastId.update({ message: success });
                    return result;
                } catch (err) {
                    toastId.update({ message: error });
                    throw err;
                }
            },
        };
        
        // Expose toast globally
        window.toast = window.sonner.toast;
        
        // Helper function to escape HTML
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }
    })();
</script>

<style>
    @keyframes slideInFromBottom {
        from {
            opacity: 0;
            transform: translateY(100%);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideOutToRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }
    
    .animate-slideInFromBottom {
        animation: slideInFromBottom 0.3s ease-out;
    }
    
    .animate-slideOutToRight {
        animation: slideOutToRight 0.2s ease-in;
    }
</style>

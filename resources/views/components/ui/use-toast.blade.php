@php
  $toastId = 'toast-container-' . uniqid();
@endphp

<div id="{{ $toastId }}" class="fixed bottom-0 right-0 z-50 flex flex-col gap-3 p-4 max-w-md pointer-events-none">
  <!-- Toasts will be inserted here by JavaScript -->
</div>

<style>
  @keyframes slideInUp {
    from {
      transform: translateY(100%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  @keyframes slideOutDown {
    from {
      transform: translateY(0);
      opacity: 1;
    }
    to {
      transform: translateY(100%);
      opacity: 0;
    }
  }

  .toast {
    animation: slideInUp 0.3s ease-out;
    pointer-events: auto;
  }

  .toast.removing {
    animation: slideOutDown 0.3s ease-in forwards;
  }

  .toast-default {
    background-color: hsl(var(--foreground));
    color: hsl(var(--background));
  }

  .toast-success {
    background-color: hsl(142, 71%, 45%);
    color: white;
  }

  .toast-error {
    background-color: hsl(var(--destructive));
    color: hsl(var(--destructive-foreground));
  }

  .toast-warning {
    background-color: hsl(45, 93%, 47%);
    color: white;
  }

  .toast-info {
    background-color: hsl(var(--primary));
    color: hsl(var(--primary-foreground));
  }
</style>

<script>
  // Toast configuration
  const toastConfig = {
    duration: 3000,
    containerId: '{{ $toastId }}',
  };

  // Toast function
  window.toast = function(options) {
    if (typeof options === 'string') {
      options = { message: options };
    }

    const {
      message = 'Notification',
      type = 'default',
      duration = toastConfig.duration,
      action = null,
    } = options;

    const container = document.getElementById(toastConfig.containerId);
    if (!container) return;

    const toastId = 'toast-' + Date.now();
    const toastElement = document.createElement('div');
    
    const typeClass = `toast-${type}`;
    
    toastElement.id = toastId;
    toastElement.className = `toast ${typeClass} rounded-lg px-4 py-3 shadow-lg flex items-center justify-between gap-3 min-w-[280px]`;
    toastElement.innerHTML = `
      <span>${message}</span>
      ${action ? `<button onclick="document.getElementById('${toastId}').remove()" class="text-xs font-semibold opacity-70 hover:opacity-100 transition-opacity">
        ${action}
      </button>` : `<button onclick="removeToast('${toastId}')" class="text-xs font-bold opacity-70 hover:opacity-100 transition-opacity">×</button>`}
    `;

    container.appendChild(toastElement);

    // Auto remove after duration
    const timeoutId = setTimeout(() => {
      removeToast(toastId);
    }, duration);

    // Store timeout for manual dismiss
    toastElement.dataset.timeoutId = timeoutId;

    return {
      close: () => removeToast(toastId),
      id: toastId,
    };
  };

  // Helper function to remove toast
  window.removeToast = function(toastId) {
    const toastElement = document.getElementById(toastId);
    if (!toastElement) return;

    // Clear timeout if exists
    if (toastElement.dataset.timeoutId) {
      clearTimeout(parseInt(toastElement.dataset.timeoutId));
    }

    toastElement.classList.add('removing');
    setTimeout(() => {
      toastElement.remove();
    }, 300);
  };

  // Expose toast variations as shortcuts
  window.toast.success = (message, options = {}) => 
    window.toast({ ...options, message, type: 'success' });
  
  window.toast.error = (message, options = {}) => 
    window.toast({ ...options, message, type: 'error' });
  
  window.toast.warning = (message, options = {}) => 
    window.toast({ ...options, message, type: 'warning' });
  
  window.toast.info = (message, options = {}) => 
    window.toast({ ...options, message, type: 'info' });
</script>

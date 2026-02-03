@php
  $toastId = 'toast-' . uniqid();
  $variant = $variant ?? 'default';
  $isDestructive = $variant === 'destructive';
  
  $variantClasses = match($variant) {
    'destructive' => 'destructive group border-destructive bg-destructive text-destructive-foreground',
    'default' => 'border bg-background text-foreground',
    default => 'border bg-background text-foreground',
  };
@endphp

<div 
  id="{{ $toastId }}"
  class="group pointer-events-auto relative flex w-full items-center justify-between space-x-4 overflow-hidden rounded-md {{ $variantClasses }} p-6 pr-8 shadow-lg transition-all"
  role="alert"
  data-variant="{{ $variant }}"
>
  <div class="flex flex-col gap-1 flex-1">
    {!! $slot !!}
  </div>
  
  <button 
    onclick="removeToast('{{ $toastId }}')"
    class="absolute right-2 top-2 rounded-md p-1 text-foreground/50 opacity-0 transition-opacity group-hover:opacity-100 group-[.destructive]:text-red-300 hover:text-foreground group-[.destructive]:hover:text-red-50 focus:opacity-100 focus:outline-none focus:ring-2 group-[.destructive]:focus:ring-red-400 group-[.destructive]:focus:ring-offset-red-600"
    aria-label="Close notification"
  >
    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
  </button>
</div>

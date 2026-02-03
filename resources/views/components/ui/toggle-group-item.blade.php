@php
  $itemId = 'toggle-group-item-' . uniqid();
  $value = $value ?? $itemId;
  $isSelected = $isSelected ?? false;
  $disabled = $disabled ?? false;
  
  // Get parent group data
  $variant = $variant ?? 'default';
  $size = $size ?? 'default';
  
  // Variant classes
  $variantClasses = match($variant) {
    'outline' => 'border border-input bg-transparent hover:bg-accent hover:text-accent-foreground',
    'default' => 'bg-transparent',
    default => 'bg-transparent',
  };
  
  // Size classes
  $sizeClasses = match($size) {
    'sm' => 'h-9 px-2.5',
    'lg' => 'h-11 px-5',
    'default' => 'h-10 px-3',
    default => 'h-10 px-3',
  };
  
  $baseClasses = 'inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors hover:bg-muted hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 cursor-pointer';
  
  $itemClasses = "{$baseClasses} {$variantClasses} {$sizeClasses}";
  
  $pressedClasses = 'bg-accent text-accent-foreground';
@endphp

<button 
  id="{{ $itemId }}"
  type="button"
  role="switch"
  aria-pressed="{{ $isSelected ? 'true' : 'false' }}"
  class="toggle-group-item {{ $itemClasses }} {{ $isSelected ? $pressedClasses : '' }}"
  data-value="{{ $value }}"
  {{ $disabled ? 'disabled' : '' }}
>
  {!! $slot !!}
</button>

<style>
  .toggle-group-item {
    transition: all 0.2s ease;
  }
  
  .toggle-group-item:focus-visible {
    outline: 2px solid hsl(var(--ring));
    outline-offset: 2px;
  }
</style>

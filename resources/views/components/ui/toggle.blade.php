@php
  $toggleId = 'toggle-' . uniqid();
  $variant = $variant ?? 'default';
  $size = $size ?? 'default';
  $disabled = $disabled ?? false;
  $isPressed = $isPressed ?? false;
  
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
  
  $toggleClasses = "{$baseClasses} {$variantClasses} {$sizeClasses}";
  
  $pressedClasses = 'bg-accent text-accent-foreground';
@endphp

<button 
  id="{{ $toggleId }}"
  type="button"
  role="switch"
  aria-pressed="{{ $isPressed ? 'true' : 'false' }}"
  class="toggle-button {{ $toggleClasses }} {{ $isPressed ? $pressedClasses : '' }}"
  {{ $disabled ? 'disabled' : '' }}
  data-variant="{{ $variant }}"
  data-size="{{ $size }}"
  onclick="toggleButton(this)"
>
  {!! $slot !!}
</button>

<script>
  function toggleButton(button) {
    const isPressed = button.getAttribute('aria-pressed') === 'true';
    button.setAttribute('aria-pressed', !isPressed);
    
    if (!isPressed) {
      button.classList.add('bg-accent', 'text-accent-foreground');
    } else {
      button.classList.remove('bg-accent', 'text-accent-foreground');
    }
    
    // Dispatch custom event for external handling
    const event = new CustomEvent('toggle', {
      detail: { pressed: !isPressed, element: button }
    });
    button.dispatchEvent(event);
  }
</script>

<style>
  .toggle-button {
    transition: all 0.2s ease;
  }
  
  .toggle-button:focus-visible {
    outline: 2px solid hsl(var(--ring));
    outline-offset: 2px;
  }
</style>

@php
  $groupId = 'toggle-group-' . uniqid();
  $variant = $variant ?? 'default';
  $size = $size ?? 'default';
  $multiple = $multiple ?? false;
  $value = $value ?? null;
@endphp

<div 
  id="{{ $groupId }}"
  class="toggle-group flex items-center justify-center gap-1"
  data-variant="{{ $variant }}"
  data-size="{{ $size }}"
  data-multiple="{{ $multiple ? 'true' : 'false' }}"
  data-value="{{ $value }}"
>
  {!! $slot !!}
</div>

<script>
  (function() {
    const group = document.getElementById('{{ $groupId }}');
    const isMultiple = group.dataset.multiple === 'true';
    const toggles = group.querySelectorAll('.toggle-group-item');
    
    toggles.forEach(toggle => {
      toggle.addEventListener('click', function(e) {
        if (!isMultiple) {
          // Single selection mode - deselect others
          toggles.forEach(t => {
            if (t !== this) {
              t.setAttribute('aria-pressed', 'false');
              t.classList.remove('bg-accent', 'text-accent-foreground');
            }
          });
        }
        
        // Toggle current
        const isPressed = this.getAttribute('aria-pressed') === 'true';
        this.setAttribute('aria-pressed', !isPressed);
        
        if (!isPressed) {
          this.classList.add('bg-accent', 'text-accent-foreground');
        } else {
          this.classList.remove('bg-accent', 'text-accent-foreground');
        }
        
        // Get selected values
        const selectedValues = Array.from(toggles)
          .filter(t => t.getAttribute('aria-pressed') === 'true')
          .map(t => t.dataset.value)
          .filter(v => v);
        
        // Dispatch custom event
        const event = new CustomEvent('toggleGroupChange', {
          detail: {
            values: selectedValues,
            lastValue: this.dataset.value,
            pressed: !isPressed
          }
        });
        group.dispatchEvent(event);
      });
    });
  })();
</script>

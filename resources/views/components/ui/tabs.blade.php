@php
  $tabsId = $id ?? 'tabs-' . uniqid();
  $defaultValue = $defaultValue ?? null;
@endphp

<div id="{{ $tabsId }}" class="tabs-root" data-default-value="{{ $defaultValue }}">
  {!! $slot !!}
</div>

<script>
  (function() {
    const root = document.getElementById('{{ $tabsId }}');
    const defaultValue = root.dataset.defaultValue;
    const triggers = root.querySelectorAll('.tabs-trigger');
    const contents = root.querySelectorAll('.tabs-content');
    
    // Set initial active tab
    if (defaultValue) {
      const activeTrigger = root.querySelector(`[data-value="${defaultValue}"]`);
      if (activeTrigger) {
        activeTrigger.setAttribute('data-state', 'active');
        activeTrigger.classList.add('bg-background', 'text-foreground', 'shadow-sm');
      }
      
      const activeContent = root.querySelector(`[data-value="${defaultValue}"][data-type="content"]`);
      if (activeContent) {
        activeContent.classList.remove('hidden');
      }
    } else if (triggers.length > 0) {
      // Activate first tab if no default
      triggers[0].setAttribute('data-state', 'active');
      triggers[0].classList.add('bg-background', 'text-foreground', 'shadow-sm');
      const firstValue = triggers[0].dataset.value;
      const firstContent = root.querySelector(`[data-value="${firstValue}"][data-type="content"]`);
      if (firstContent) {
        firstContent.classList.remove('hidden');
      }
    }
    
    // Tab click handlers
    triggers.forEach(trigger => {
      trigger.addEventListener('click', function() {
        const value = this.dataset.value;
        
        // Deactivate all triggers and contents
        triggers.forEach(t => {
          t.setAttribute('data-state', 'inactive');
          t.classList.remove('bg-background', 'text-foreground', 'shadow-sm');
        });
        contents.forEach(c => {
          c.classList.add('hidden');
        });
        
        // Activate clicked trigger and its content
        this.setAttribute('data-state', 'active');
        this.classList.add('bg-background', 'text-foreground', 'shadow-sm');
        
        const activeContent = root.querySelector(`[data-value="${value}"][data-type="content"]`);
        if (activeContent) {
          activeContent.classList.remove('hidden');
        }
        
        // Dispatch custom event
        const event = new CustomEvent('tabsChange', {
          detail: { value: value }
        });
        root.dispatchEvent(event);
      });
    });
  })();
</script>

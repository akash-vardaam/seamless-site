@php
  $value = $value ?? '';
  $disabled = $disabled ?? false;
  $customClass = $class ?? '';
  
  $baseClasses = 'tabs-trigger inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 cursor-pointer';
  
  $triggerClasses = "{$baseClasses} {$customClass}";
@endphp

<button 
  type="button"
  role="tab"
  class="{{ $triggerClasses }}"
  data-value="{{ $value }}"
  data-state="inactive"
  {{ $disabled ? 'disabled' : '' }}
>
  {!! $slot !!}
</button>

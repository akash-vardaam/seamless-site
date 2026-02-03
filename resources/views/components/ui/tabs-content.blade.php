@php
  $value = $value ?? '';
  $customClass = $class ?? '';
  
  $baseClasses = 'tabs-content mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 hidden';
  
  $contentClasses = "{$baseClasses} {$customClass}";
@endphp

<div 
  role="tabpanel"
  class="{{ $contentClasses }}"
  data-value="{{ $value }}"
  data-type="content"
>
  {!! $slot !!}
</div>

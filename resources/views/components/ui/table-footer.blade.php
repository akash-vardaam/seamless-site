@php
  $customClass = $class ?? '';
  $baseClasses = 'border-t bg-muted/50 font-medium [&>tr]:last:border-b-0';
  $footerClasses = "{$baseClasses} {$customClass}";
@endphp

<tfoot class="{{ $footerClasses }}">
  {!! $slot !!}
</tfoot>

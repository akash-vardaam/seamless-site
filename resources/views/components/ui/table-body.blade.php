@php
  $customClass = $class ?? '';
  $baseClasses = '[&_tr:last-child]:border-0';
  $bodyClasses = "{$baseClasses} {$customClass}";
@endphp

<tbody class="{{ $bodyClasses }}">
  {!! $slot !!}
</tbody>

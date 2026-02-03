@php
  $customClass = $class ?? '';
  $baseClasses = '[&_tr]:border-b';
  $headerClasses = "{$baseClasses} {$customClass}";
@endphp

<thead class="{{ $headerClasses }}">
  {!! $slot !!}
</thead>

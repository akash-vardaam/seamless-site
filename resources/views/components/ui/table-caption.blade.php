@php
  $customClass = $class ?? '';
  $baseClasses = 'mt-4 text-sm text-muted-foreground';
  $captionClasses = "{$baseClasses} {$customClass}";
@endphp

<caption class="{{ $captionClasses }}">
  {!! $slot !!}
</caption>

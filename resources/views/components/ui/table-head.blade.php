@php
  $customClass = $class ?? '';
  $baseClasses = 'h-12 px-4 text-left align-middle font-medium text-muted-foreground';
  $headClasses = "{$baseClasses} {$customClass}";
@endphp

<th class="{{ $headClasses }}" {{ isset($attributes) ? $attributes : '' }}>
  {!! $slot !!}
</th>

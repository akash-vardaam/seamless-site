@php
  $customClass = $class ?? '';
  $baseClasses = 'p-4 align-middle';
  $cellClasses = "{$baseClasses} {$customClass}";
@endphp

<td class="{{ $cellClasses }}" {{ isset($attributes) ? $attributes : '' }}>
  {!! $slot !!}
</td>

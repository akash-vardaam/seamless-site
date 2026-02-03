@php
  $customClass = $class ?? '';
  $baseClasses = 'border-b transition-colors hover:bg-muted/50';
  $rowClasses = "{$baseClasses} {$customClass}";
  $isSelected = $isSelected ?? false;
@endphp

<tr class="{{ $rowClasses }} {{ $isSelected ? 'bg-muted' : '' }}" {{ isset($attributes) ? $attributes : '' }}>
  {!! $slot !!}
</tr>

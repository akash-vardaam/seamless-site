@php
  $customClass = $class ?? '';
  $baseClasses = 'w-full caption-bottom text-sm';
  $tableClasses = "{$baseClasses} {$customClass}";
@endphp

<div class="relative w-full overflow-auto">
  <table class="{{ $tableClasses }}" {{ isset($attributes) ? $attributes : '' }}>
    {!! $slot !!}
  </table>
</div>

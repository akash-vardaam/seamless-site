@php
  $customClass = $class ?? '';
  $baseClasses = 'inline-flex h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground';
  $listClasses = "{$baseClasses} {$customClass}";
@endphp

<div class="tabs-list {{ $listClasses }}" role="tablist">
  {!! $slot !!}
</div>

@props(['heading' => ''])

<div
  {{ $attributes->class([
      'overflow-hidden p-1 text-foreground',
  ]) }}
>
  @if($heading)
    <div class="px-2 py-1.5 text-xs font-medium text-muted-foreground">
      {{ $heading }}
    </div>
  @endif
  <div class="space-y-1">
    {{ $slot }}
  </div>
</div>

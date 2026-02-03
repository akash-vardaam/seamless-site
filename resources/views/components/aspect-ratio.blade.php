@props(['ratio' => 16 / 9])

<div
  {{ $attributes->class([
      'relative w-full overflow-hidden bg-muted',
  ]) }}
  style="aspect-ratio: {{ $ratio }}"
>
  <div class="absolute inset-0 flex items-center justify-center">
    {{ $slot }}
  </div>
</div>

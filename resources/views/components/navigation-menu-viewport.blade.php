<div class="absolute left-0 top-full flex justify-center">
  <div
    {{ $attributes->class([
        'origin-top-center relative mt-1.5 h-auto w-full overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-lg',
    ]) }}
  >
    {{ $slot }}
  </div>
</div>

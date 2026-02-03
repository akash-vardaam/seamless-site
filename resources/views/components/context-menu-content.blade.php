<div
  data-context-content
  x-show="open"
  x-transition:enter="transition duration-100 ease-out"
  x-transition:enter-start="opacity-0 scale-95"
  x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition duration-100 ease-in"
  x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-95"
  @click.away="closeMenu()"
  {{ $attributes->class([
      'z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md',
  ]) }}
>
  {{ $slot }}
</div>

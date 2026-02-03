@props(['align' => 'center', 'side' => 'bottom'])

<div
  x-show="open"
  x-transition:enter="transition duration-200 ease-out"
  x-transition:enter-start="opacity-0 scale-95"
  x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition duration-200 ease-in"
  x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-95"
  @click.away="close()"
  {{ $attributes->class([
      'absolute z-50 w-72 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none',
      'top-full left-1/2 -translate-x-1/2 mt-2' => $side === 'bottom',
      'bottom-full left-1/2 -translate-x-1/2 mb-2' => $side === 'top',
      'top-1/2 left-full -translate-y-1/2 ml-2' => $side === 'right',
      'top-1/2 right-full -translate-y-1/2 mr-2' => $side === 'left',
  ]) }}
>
  {{ $slot }}
</div>

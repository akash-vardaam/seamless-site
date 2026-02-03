@props(['side' => 'bottom', 'align' => 'center', 'sideOffset' => 4])

<div
  x-show="open"
  x-transition:enter="transition duration-100 ease-out"
  x-transition:enter-start="opacity-0 scale-95"
  x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition duration-100 ease-in"
  x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-95"
  @mouseenter="cancel(); startOpen()"
  @mouseleave="startClose()"
  data-side="{{ $side }}"
  data-align="{{ $align }}"
  {{ $attributes->class([
      'z-50 w-64 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none',
      'absolute left-1/2 -translate-x-1/2' => $align === 'center',
      'absolute left-0' => $align === 'start',
      'absolute right-0' => $align === 'end',
      'top-full mt-2' => $side === 'bottom',
      'bottom-full mb-2' => $side === 'top',
      'left-full ml-2' => $side === 'right',
      'right-full mr-2' => $side === 'left',
  ]) }}
>
  {{ $slot }}
</div>

<button
  type="button"
  x-on:mouseenter="startOpen()"
  x-on:mouseleave="startClose()"
  {{ $attributes->class([
      'inline-flex items-center justify-center rounded-md text-sm font-medium',
  ]) }}
>
  {{ $slot }}
</button>

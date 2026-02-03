<button
  type="button"
  x-on:click="toggle()"
  {{ $attributes->class([
      'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors',
  ]) }}
>
  {{ $slot }}
</button>

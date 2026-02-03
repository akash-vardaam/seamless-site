<button
  type="button"
  x-on:click="toggle()"
  :aria-expanded="open"
  {{ $attributes->class([
      'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground',
  ]) }}
>
  {{ $slot }}
</button>

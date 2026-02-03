@props([''])

<button
  type="button"
  x-on:click="toggle()"
  {{ $attributes->class(['']) }}
>
  {{ $slot }}
</button>

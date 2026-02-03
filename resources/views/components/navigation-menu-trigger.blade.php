@props(['id' => null])

@php
$triggerId = $id ?: uniqid('nav-trigger-');
@endphp

<button
  type="button"
  x-on:click="setActiveItem('{{ $triggerId }}')"
  @click.away="closeMenu()"
  :class="activeItem === '{{ $triggerId }}' ? 'bg-accent/50 text-accent-foreground' : ''"
  {{ $attributes->class([
      'group inline-flex h-10 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50',
  ]) }}
>
  {{ $slot }}
  <svg
    :class="activeItem === '{{ $triggerId }}' ? 'rotate-180' : ''"
    class="relative top-[1px] ml-1 h-3 w-3 transition duration-200"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
  >
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
  </svg>
</button>

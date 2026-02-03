@props(['inset' => false])

<button
  type="button"
  x-on:click="openSubmenu('{{ uniqid('submenu-') }}')"
  x-on:mouseenter="openSubmenu('{{ uniqid('submenu-') }}')"
  {{ $attributes->class([
      'flex w-full cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
      'pl-8' => $inset,
  ]) }}
>
  {{ $slot }}
  <svg class="ml-auto h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
  </svg>
</button>

@props(['id' => null])

@php
$menuId = $id ?: uniqid('menu-');
@endphp

<button
  type="button"
  x-on:click="openMenubar('{{ $menuId }}')"
  :class="openMenu === '{{ $menuId }}' ? 'bg-accent text-accent-foreground' : ''"
  {{ $attributes->class([
      'flex cursor-default select-none items-center rounded-sm px-3 py-1.5 text-sm font-medium outline-none hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
  ]) }}
>
  {{ $slot }}
</button>

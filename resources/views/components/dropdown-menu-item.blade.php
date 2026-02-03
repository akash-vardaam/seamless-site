@props(['value' => '', 'inset' => false, 'disabled' => false])

<button
  type="button"
  x-on:click="selectItem('{{ $value }}')"
  @disabled($disabled)
  {{ $attributes->class([
      'relative flex w-full cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
      'pl-8' => $inset,
      'pointer-events-none opacity-50' => $disabled,
  ]) }}
>
  {{ $slot }}
</button>

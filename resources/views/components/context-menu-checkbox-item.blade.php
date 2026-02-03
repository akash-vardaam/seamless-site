@props(['value' => '', 'checked' => false, 'disabled' => false])

<button
  type="button"
  x-data="{ checked: {{ $checked ? 'true' : 'false' }} }"
  x-on:click="checked = !checked; selectItem('{{ $value }}')"
  @disabled($disabled)
  {{ $attributes->class([
      'relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
      'pointer-events-none opacity-50' => $disabled,
  ]) }}
>
  <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
    <svg x-show="checked" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
  </span>
  {{ $slot }}
</button>

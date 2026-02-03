@props(['value' => '', 'disabled' => false])

<button
  type="button"
  x-on:click="$dispatch('command-select', { value: '{{ $value }}' })"
  @disabled($disabled)
  {{ $attributes->class([
      'relative flex w-full cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none hover:bg-accent hover:text-accent-foreground data-[disabled=true]:pointer-events-none data-[disabled=true]:opacity-50',
      'cursor-not-allowed opacity-50' => $disabled,
  ]) }}
>
  {{ $slot }}
</button>

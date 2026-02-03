@props(['id'])

<button
  type="button"
  x-on:click="$parent.toggle(id)"
  :aria-expanded="isOpen(id)"
  :data-state="isOpen(id) ? 'open' : 'closed'"
  {{ $attributes->class([
      'flex flex-1 items-center justify-between py-4 font-medium transition-all hover:underline w-full text-left',
      '[&[data-state=open]>svg]:rotate-180' => true,
  ]) }}
>
  {{ $slot }}
  <svg
    class="h-4 w-4 shrink-0 transition-transform duration-200"
    xmlns="http://www.w3.org/2000/svg"
    width="24"
    height="24"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
  >
    <polyline points="6 9 12 15 18 9"></polyline>
  </svg>
</button>

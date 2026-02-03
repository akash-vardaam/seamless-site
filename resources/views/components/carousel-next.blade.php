@props(['variant' => 'outline', 'size' => 'icon'])

<x-button
  :variant="$variant"
  :size="$size"
  x-on:click="scrollNext()"
  :disabled="!canScrollNext"
  {{ $attributes->class([
      'absolute h-8 w-8 rounded-full',
      'right-0 top-1/2 -translate-y-1/2' => true,
  ]) }}
>
  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
  </svg>
  <span class="sr-only">Next slide</span>
</x-button>

@props(['variant' => 'outline', 'size' => 'icon'])

<x-button
  :variant="$variant"
  :size="$size"
  x-on:click="scrollPrev()"
  :disabled="!canScrollPrev"
  {{ $attributes->class([
      'absolute h-8 w-8 rounded-full',
      'left-0 top-1/2 -translate-y-1/2' => true,
  ]) }}
>
  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
  </svg>
  <span class="sr-only">Previous slide</span>
</x-button>

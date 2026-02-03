@props(['href' => '#'])

<a
  href="{{ $href }}"
  aria-label="Go to previous page"
  {{ $attributes->class([
      'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50',
      'h-9 px-4 hover:bg-accent hover:text-accent-foreground gap-1 pl-2.5',
  ]) }}
>
  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
  </svg>
  <span>Previous</span>
</a>

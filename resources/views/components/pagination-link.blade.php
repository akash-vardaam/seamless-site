@props(['isActive' => false, 'href' => '#'])

<a
  href="{{ $href }}"
  @if($isActive)
    aria-current="page"
  @endif
  {{ $attributes->class([
      'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50',
      'h-9 w-9 px-0' => true,
      'border border-input bg-background hover:bg-accent hover:text-accent-foreground' => $isActive,
      'hover:bg-accent hover:text-accent-foreground' => !$isActive,
  ]) }}
>
  {{ $slot }}
</a>

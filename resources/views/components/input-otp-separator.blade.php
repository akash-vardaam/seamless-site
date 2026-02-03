{{ $attributes->class([
    'flex items-center justify-center text-muted-foreground px-2 h-10',
]) }}
>
  @if($slot->isEmpty())
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <circle cx="12" cy="12" r="2"></circle>
    </svg>
  @else
    {{ $slot }}
  @endif
</div>

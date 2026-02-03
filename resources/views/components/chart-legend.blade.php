@props(['hideIcon' => false, 'items' => []])

<div
  {{ $attributes->class([
      'flex items-center justify-center gap-4 pt-3',
  ]) }}
>
  @forelse($items as $item)
    <div class="flex items-center gap-1.5">
      @if(!$hideIcon && isset($item['icon']))
        <span class="h-3 w-3 text-muted-foreground">
          {!! $item['icon'] !!}
        </span>
      @endif
      @if(!$hideIcon)
        <div
          class="h-2 w-2 shrink-0 rounded-[2px]"
          style="background-color: {{ $item['color'] ?? '#000' }}"
        ></div>
      @endif
      <span>{{ $item['label'] ?? $item['name'] ?? '' }}</span>
    </div>
  @empty
    {{ $slot }}
  @endforelse
</div>

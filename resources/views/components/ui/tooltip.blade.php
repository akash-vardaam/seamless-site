@php
  $tooltipId = 'tooltip-' . uniqid();
  $side = $side ?? 'top';
  $sideOffset = $sideOffset ?? 4;
@endphp

<div class="tooltip-wrapper group relative inline-block" data-tooltip-id="{{ $tooltipId }}" data-side="{{ $side }}">
  {!! $slot !!}
  
  <div 
    id="{{ $tooltipId }}" 
    class="tooltip-content absolute z-50 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none
      {{ $side === 'top' ? 'bottom-full mb-2' : '' }}
      {{ $side === 'bottom' ? 'top-full mt-2' : '' }}
      {{ $side === 'left' ? 'right-full mr-2' : '' }}
      {{ $side === 'right' ? 'left-full ml-2' : '' }}
      {{ $side === 'top' || $side === 'bottom' ? 'left-1/2 -translate-x-1/2' : '' }}
      {{ $side === 'left' || $side === 'right' ? 'top-1/2 -translate-y-1/2' : '' }}
    "
    role="tooltip"
  >
    <div class="overflow-hidden rounded-md border border-border bg-popover px-3 py-1.5 text-sm text-popover-foreground shadow-md whitespace-nowrap">
      {!! $content ?? '' !!}
    </div>
    
    <!-- Arrow -->
    <div class="absolute w-2 h-2 bg-popover border-t border-r border-border"
      {{ $side === 'top' ? 'style="bottom: -6px; left: 50%; transform: translateX(-50%) rotate(45deg);"' : '' }}
      {{ $side === 'bottom' ? 'style="top: -6px; left: 50%; transform: translateX(-50%) rotate(45deg);"' : '' }}
      {{ $side === 'left' ? 'style="right: -6px; top: 50%; transform: translateY(-50%) rotate(45deg);"' : '' }}
      {{ $side === 'right' ? 'style="left: -6px; top: 50%; transform: translateY(-50%) rotate(45deg);"' : '' }}
    ></div>
  </div>
</div>

@php
  $providerId = 'tooltip-provider-' . uniqid();
@endphp

<div id="{{ $providerId }}" class="tooltip-provider">
  {!! $slot !!}
</div>

<style>
  .tooltip-content {
    animation: tooltipFadeIn 0.2s ease-in-out;
  }
  
  @keyframes tooltipFadeIn {
    from {
      opacity: 0;
      transform: scale(0.95);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }
  
  .tooltip-wrapper:hover .tooltip-content {
    animation: tooltipFadeIn 0.2s ease-in-out forwards;
  }
</style>

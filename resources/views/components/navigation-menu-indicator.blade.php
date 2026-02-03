@props(['id' => null])

@php
$indicatorId = $id ?: uniqid('nav-indicator-');
@endphp

<div
  x-show="activeItem === '{{ $indicatorId }}'"
  x-transition:enter="transition duration-200 ease-out"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition duration-200 ease-in"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  {{ $attributes->class([
      'top-full z-[1] flex h-1.5 items-end justify-center overflow-hidden',
  ]) }}
>
  <div class="relative top-[60%] h-2 w-2 rotate-45 rounded-tl-sm bg-border shadow-md"></div>
</div>

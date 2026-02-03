@props(['id' => null])

@php
$contentId = $id ?: uniqid('nav-content-');
@endphp

<div
  x-show="activeItem === '{{ $contentId }}'"
  x-transition:enter="transition duration-200 ease-out"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition duration-200 ease-in"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  {{ $attributes->class([
      'left-0 top-0 w-full md:absolute md:w-auto',
  ]) }}
>
  {{ $slot }}
</div>

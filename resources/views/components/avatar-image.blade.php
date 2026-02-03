@props(['src', 'alt' => 'Avatar'])

<img
  src="{{ $src }}"
  alt="{{ $alt }}"
  {{ $attributes->class([
      'aspect-square h-full w-full object-cover',
  ]) }}
/>

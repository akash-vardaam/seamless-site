@props(['orientation' => 'horizontal'])

<div
  data-carousel-item
  role="group"
  aria-roledescription="slide"
  {{ $attributes->class([
      'min-w-0 shrink-0 grow-0 basis-full',
      'pl-4' => $orientation === 'horizontal',
      'pt-4' => $orientation !== 'horizontal',
  ]) }}
>
  {{ $slot }}
</div>

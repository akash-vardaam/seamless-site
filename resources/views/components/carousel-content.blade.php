<div data-carousel-content class="overflow-hidden">
  <div
    {{ $attributes->class([
        'flex',
        '-ml-4' => $orientation === 'horizontal',
        '-mt-4 flex-col' => $orientation !== 'horizontal',
    ]) }}
  >
    {{ $slot }}
  </div>
</div>

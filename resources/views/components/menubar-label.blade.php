@props(['inset' => false])

<div
  {{ $attributes->class([
      'px-2 py-1.5 text-sm font-semibold',
      'pl-8' => $inset,
  ]) }}
>
  {{ $slot }}
</div>

@props(['id'])

<div
  x-data="{ id: '{{ $id }}' }"
  {{ $attributes->class('border-b') }}
>
  {{ $slot }}
</div>

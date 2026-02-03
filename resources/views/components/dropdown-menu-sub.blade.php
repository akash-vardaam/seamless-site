@props(['id' => null])

<div x-data="{ submenuId: '{{ $id ?: uniqid() }}' }">
  {{ $slot }}
</div>

@props(['id' => null])

@php
$menuId = $id ?: uniqid('submenu-');
@endphp

<div x-data="{ submenuId: '{{ $menuId }}' }">
  {{ $slot }}
</div>

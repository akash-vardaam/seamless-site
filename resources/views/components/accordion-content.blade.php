@props(['id'])

<div
  x-show="isOpen(id)"
  :data-state="isOpen(id) ? 'open' : 'closed'"
  x-transition:enter="transition duration-200 ease-out"
  x-transition:enter-start="opacity-0 -translate-y-1"
  x-transition:enter-end="opacity-100 translate-y-0"
  x-transition:leave="transition duration-200 ease-in"
  x-transition:leave-start="opacity-100 translate-y-0"
  x-transition:leave-end="opacity-0 -translate-y-1"
  {{ $attributes->class('overflow-hidden text-sm') }}
>
  <div class="pb-4 pt-0">
    {{ $slot }}
  </div>
</div>

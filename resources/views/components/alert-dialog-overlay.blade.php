@props(['id' => 'alert-overlay'])

<div
  x-show="open"
  x-transition:enter="transition duration-200 ease-out"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition duration-200 ease-in"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  x-on:click="closeDialog()"
  {{ $attributes->class([
      'fixed inset-0 z-50 bg-black/80',
  ]) }}
  id="{{ $id }}"
/>

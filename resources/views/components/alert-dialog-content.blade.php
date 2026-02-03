@props(['id' => 'alert-content'])

<x-alert-dialog-portal>
  <x-alert-dialog-overlay />
  
  <div
    x-show="open"
    x-transition:enter="transition duration-200 ease-out"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition duration-200 ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    {{ $attributes->class([
        'fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 sm:rounded-lg',
    ]) }}
    id="{{ $id }}"
    @click.stop
  >
    {{ $slot }}
  </div>
</x-alert-dialog-portal>

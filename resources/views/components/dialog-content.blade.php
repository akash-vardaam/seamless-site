@props(['id' => 'dialog-content'])

<x-dialog-portal>
  <x-dialog-overlay />
  
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

    <button
      type="button"
      x-on:click="closeDialog()"
      class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none"
    >
      <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
      <span class="sr-only">Close</span>
    </button>
  </div>
</x-dialog-portal>

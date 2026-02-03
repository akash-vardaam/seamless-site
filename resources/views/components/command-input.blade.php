@props(['placeholder' => 'Search...'])

<div class="flex items-center border-b px-3">
  <svg class="mr-2 h-4 w-4 shrink-0 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
  </svg>
  <input
    type="text"
    placeholder="{{ $placeholder }}"
    x-on:input="$dispatch('command-search', { query: $el.value })"
    {{ $attributes->class([
        'flex h-11 w-full bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50',
    ]) }}
  />
</div>

@props(['open' => false])

<div
  x-data="commandDialog({
    open: {{ $open ? 'true' : 'false' }},
  })"
  x-show="open"
  @keydown.escape="open = false"
  class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center"
>
  <div
    class="w-full max-w-lg rounded-lg bg-popover shadow-lg"
    @click.stop
  >
    {{ $slot }}
  </div>
</div>

@once
  @push('scripts')
    <script>
      function commandDialog({ open = false }) {
        return {
          open,
          toggle() {
            this.open = !this.open;
          },
        };
      }
    </script>
  @endpush
@endonce

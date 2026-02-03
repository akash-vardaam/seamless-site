@props(['open' => false])

<div
  x-data="collapsible({
    open: {{ $open ? 'true' : 'false' }},
  })"
  {{ $attributes }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function collapsible({ open = false }) {
        return {
          open,
          toggle() {
            this.open = !this.open;
            this.$dispatch('collapsible-toggle', { open: this.open });
          },
        };
      }
    </script>
  @endpush
@endonce

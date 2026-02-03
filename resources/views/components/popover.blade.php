@props([''])

<div
  x-data="popover()"
  {{ $attributes->class(['relative']) }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function popover() {
        return {
          open: false,

          toggle() {
            this.open = !this.open;
          },

          close() {
            this.open = false;
          },
        };
      }
    </script>
  @endpush
@endonce

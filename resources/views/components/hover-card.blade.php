@props(['openDelay' => 200, 'closeDelay' => 200])

<div
  x-data="hoverCard({
    openDelay: {{ $openDelay }},
    closeDelay: {{ $closeDelay }},
  })"
  {{ $attributes }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function hoverCard({ openDelay = 200, closeDelay = 200 }) {
        return {
          open: false,
          openDelay,
          closeDelay,
          openTimeout: null,
          closeTimeout: null,

          startOpen() {
            clearTimeout(this.closeTimeout);
            this.openTimeout = setTimeout(() => {
              this.open = true;
            }, this.openDelay);
          },

          startClose() {
            clearTimeout(this.openTimeout);
            this.closeTimeout = setTimeout(() => {
              this.open = false;
            }, this.closeDelay);
          },

          cancel() {
            clearTimeout(this.openTimeout);
            clearTimeout(this.closeTimeout);
          },
        };
      }
    </script>
  @endpush
@endonce

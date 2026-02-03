@props(['open' => false])

<div
  x-data="alertDialog({ open: {{ $open ? 'true' : 'false' }} })"
  {{ $attributes }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function alertDialog({ open = false }) {
        return {
          open,
          openDialog() {
            this.open = true;
            document.body.style.overflow = 'hidden';
          },
          closeDialog() {
            this.open = false;
            document.body.style.overflow = '';
          },
          toggleDialog() {
            if (this.open) {
              this.closeDialog();
            } else {
              this.openDialog();
            }
          },
        };
      }
    </script>
  @endpush
@endonce

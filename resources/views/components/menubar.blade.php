@props([''])

<div
  x-data="menubar()"
  {{ $attributes->class([
      'flex h-10 items-center space-x-1 rounded-md border bg-background p-1',
  ]) }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function menubar() {
        return {
          openMenu: null,

          openMenubar(id) {
            this.openMenu = this.openMenu === id ? null : id;
          },

          closeMenubar() {
            this.openMenu = null;
          },

          selectItem(value) {
            this.$dispatch('menubar-select', { value });
            this.closeMenubar();
          },
        };
      }
    </script>
  @endpush
@endonce

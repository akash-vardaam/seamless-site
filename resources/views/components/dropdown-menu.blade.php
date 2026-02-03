@props(['open' => false])

<div
  x-data="dropdownMenu({
    open: {{ $open ? 'true' : 'false' }},
  })"
  {{ $attributes }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function dropdownMenu({ open = false }) {
        return {
          open,
          submenuOpen: null,

          toggle() {
            this.open = !this.open;
            if (!this.open) {
              this.submenuOpen = null;
            }
          },

          openSubmenu(id) {
            this.submenuOpen = this.submenuOpen === id ? null : id;
          },

          selectItem(value) {
            this.$dispatch('dropdown-menu-select', { value });
            this.open = false;
            this.submenuOpen = null;
          },

          closeMenu() {
            this.open = false;
            this.submenuOpen = null;
          },
        };
      }
    </script>
  @endpush
@endonce

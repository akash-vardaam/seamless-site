@props(['selector' => ''])

<div
  x-data="contextMenu()"
  {{ $attributes }}
  @contextmenu.prevent="openMenu($event)"
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function contextMenu() {
        return {
          open: false,
          x: 0,
          y: 0,
          submenuOpen: null,

          openMenu(event) {
            this.open = true;
            this.x = event.clientX;
            this.y = event.clientY;
            this.submenuOpen = null;

            this.$nextTick(() => {
              const menu = this.$el.querySelector('[data-context-content]');
              if (menu) {
                menu.style.position = 'fixed';
                menu.style.left = this.x + 'px';
                menu.style.top = this.y + 'px';
              }
            });
          },

          closeMenu() {
            this.open = false;
            this.submenuOpen = null;
          },

          openSubmenu(id) {
            this.submenuOpen = this.submenuOpen === id ? null : id;
          },

          selectItem(value) {
            this.$dispatch('context-menu-select', { value });
            this.closeMenu();
          },
        };
      }
    </script>
  @endpush
@endonce

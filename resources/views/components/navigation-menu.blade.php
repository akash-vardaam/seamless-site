@props(['orientation' => 'horizontal'])

<nav
  x-data="navigationMenu()"
  {{ $attributes->class([
      'relative z-10 flex max-w-max flex-1 items-center justify-center',
  ]) }}
>
  {{ $slot }}
</nav>

@once
  @push('scripts')
    <script>
      function navigationMenu() {
        return {
          activeItem: null,

          setActiveItem(id) {
            this.activeItem = this.activeItem === id ? null : id;
          },

          closeMenu() {
            this.activeItem = null;
          },
        };
      }
    </script>
  @endpush
@endonce

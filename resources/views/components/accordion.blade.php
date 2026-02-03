@props(['type' => 'single', 'collapsible' => false])

<div
  x-data="accordion({ type: '{{ $type }}', collapsible: {{ $collapsible ? 'true' : 'false' }} })"
  {{ $attributes->class('w-full') }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function accordion({ type = 'single', collapsible = false }) {
        return {
          type,
          collapsible,
          openItems: [],
          toggle(id) {
            if (this.type === 'single') {
              if (this.openItems.includes(id)) {
                if (this.collapsible) {
                  this.openItems = [];
                }
              } else {
                this.openItems = [id];
              }
            } else {
              const index = this.openItems.indexOf(id);
              if (index > -1) {
                this.openItems.splice(index, 1);
              } else {
                this.openItems.push(id);
              }
            }
          },
          isOpen(id) {
            return this.openItems.includes(id);
          },
        };
      }
    </script>
  @endpush
@endonce

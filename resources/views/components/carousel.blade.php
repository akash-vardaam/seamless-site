@props(['orientation' => 'horizontal'])

<div
  x-data="carousel({
    orientation: '{{ $orientation }}',
  })"
  role="region"
  aria-roledescription="carousel"
  {{ $attributes->class(['relative']) }}
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function carousel({ orientation = 'horizontal' }) {
        return {
          orientation,
          canScrollPrev: false,
          canScrollNext: true,
          currentIndex: 0,
          scrollContainer: null,

          init() {
            this.scrollContainer = this.$el.querySelector('[data-carousel-content]');
            this.updateScrollState();
            if (this.scrollContainer) {
              this.scrollContainer.addEventListener('scroll', () => this.updateScrollState());
            }
          },

          updateScrollState() {
            if (!this.scrollContainer) return;

            if (this.orientation === 'horizontal') {
              this.canScrollPrev = this.scrollContainer.scrollLeft > 0;
              this.canScrollNext = 
                this.scrollContainer.scrollLeft + this.scrollContainer.clientWidth < 
                this.scrollContainer.scrollWidth - 10;
            } else {
              this.canScrollPrev = this.scrollContainer.scrollTop > 0;
              this.canScrollNext = 
                this.scrollContainer.scrollTop + this.scrollContainer.clientHeight < 
                this.scrollContainer.scrollHeight - 10;
            }
          },

          scrollPrev() {
            if (!this.scrollContainer) return;
            const itemWidth = this.scrollContainer.querySelector('[data-carousel-item]')?.clientWidth || 
                             this.scrollContainer.querySelector('[data-carousel-item]')?.clientHeight || 300;
            
            if (this.orientation === 'horizontal') {
              this.scrollContainer.scrollBy({ left: -itemWidth, behavior: 'smooth' });
            } else {
              this.scrollContainer.scrollBy({ top: -itemWidth, behavior: 'smooth' });
            }
          },

          scrollNext() {
            if (!this.scrollContainer) return;
            const itemWidth = this.scrollContainer.querySelector('[data-carousel-item]')?.clientWidth || 
                             this.scrollContainer.querySelector('[data-carousel-item]')?.clientHeight || 300;
            
            if (this.orientation === 'horizontal') {
              this.scrollContainer.scrollBy({ left: itemWidth, behavior: 'smooth' });
            } else {
              this.scrollContainer.scrollBy({ top: itemWidth, behavior: 'smooth' });
            }
          },

          handleKeyDown(e) {
            if (e.key === 'ArrowLeft') {
              e.preventDefault();
              this.scrollPrev();
            } else if (e.key === 'ArrowRight') {
              e.preventDefault();
              this.scrollNext();
            }
          },
        };
      }
    </script>
  @endpush
@endonce

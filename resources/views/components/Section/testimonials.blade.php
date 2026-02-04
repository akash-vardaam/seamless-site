@php
    $testimonials = [
        [
            'quote' => "This platform has completely transformed how we manage our association. The seamless integration and intuitive design have saved us countless hours.",
            'author' => 'Sarah Mitchell',
            'title' => 'Executive Director',
            'company' => 'National Healthcare Association',
            'rating' => 5,
        ],
        [
            'quote' => "Finally, an AMS that adapts to our needs instead of forcing us to adapt to it. The unified approach has streamlined our entire operation.",
            'author' => 'Michael Chen',
            'title' => 'Operations Manager',
            'company' => 'Tech Professionals Guild',
            'rating' => 5,
        ],
        [
            'quote' => "The support team is incredible, and the platform itself is a game-changer. We've seen a 40% increase in member engagement since switching.",
            'author' => 'Emily Rodriguez',
            'title' => 'Membership Director',
            'company' => 'Creative Industries Alliance',
            'rating' => 5,
        ],
        [
            'quote' => "After years of struggling with outdated systems, this modern solution has reinvigorated our team and delighted our members.",
            'author' => 'David Thompson',
            'title' => 'CEO',
            'company' => 'Professional Engineers Society',
            'rating' => 5,
        ],
    ];

    $id = 'testimonials-' . uniqid();
@endphp

<section id="{{ $id }}" class="testimonials-section">
  <div class="testimonials-bg" style="background-image: url('{{ asset('assets/section-6-bg.png') }}')"></div>

  <div class="testimonials-container">
    <div class="testimonials-header">
      <span class="testimonials-badge">Testimonials</span>
      <h2 class="testimonials-title">Loved by Industry Leaders</h2>
      <p class="testimonials-subtitle">See why leading associations trust us to power their member experience</p>
    </div>

    <div class="testimonials-content">
      <div class="testimonials-slider">
        <button data-action="prev" class="testimonials-nav testimonials-nav-prev" aria-label="Previous testimonial">
          <svg class="testimonials-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button data-action="next" class="testimonials-nav testimonials-nav-next" aria-label="Next testimonial">
          <svg class="testimonials-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <div class="testimonials-card">
          @foreach($testimonials as $i => $t)
            <div class="testimonial-item {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}" style="display: {{ $i === 0 ? 'block' : 'none' }};">
              <div class="relative bg-background/80 backdrop-blur-sm rounded-2xl shadow-xl border border-border/50 p-6 md:p-10">
                <div class="absolute -top-4 left-8 md:left-10">
                  <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary/70 flex items-center justify-center shadow-lg shadow-primary/30">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-primary-foreground fill-primary-foreground"><path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path></svg>
                  </div>
                </div>

                <div class="transition-all duration-300 ease-out opacity-100 translate-x-0">
                  <div class="flex gap-0.5 mb-4 pt-3">
                    @for($s = 0; $s < $t['rating']; $s++)
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 fill-primary text-primary"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                    @endfor
                  </div>

                  <blockquote class="text-base md:text-lg lg:text-xl text-foreground leading-relaxed mb-6 font-medium">"{{ $t['quote'] }}"</blockquote>

                  <div class="flex items-center gap-3">
                    <div class="relative">
                      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-primary/20 to-accent/20 flex items-center justify-center">
                        <span class="text-lg font-bold bg-gradient-to-br from-primary to-accent bg-clip-text text-transparent">{{ strtoupper(substr($t['author'],0,1)) }}</span>
                      </div>
                    </div>
                    <div>
                      <p class="font-bold text-sm text-foreground">{{ $t['author'] }}</p>
                      <p class="text-muted-foreground text-xs">{{ $t['title'] }}</p>
                      <p class="text-xs text-primary font-medium">{{ $t['company'] }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="testimonials-indicators">
        @foreach($testimonials as $i => $t)
          <button data-indicator-index="{{ $i }}" class="testimonial-indicator {{ $i === 0 ? 'indicator-active' : '' }}" aria-label="Go to testimonial {{ $i + 1 }}"></button>
        @endforeach
      </div>
    </div>
  </div>

  <style>
    .testimonials-section {
      position: relative;
      padding: 6rem 0;
      overflow: hidden;
    }

    .testimonials-bg {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .testimonials-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
      position: relative;
      z-index: 10;
    }

    .testimonials-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .testimonials-badge {
      display: inline-block;
      padding: 0.375rem 1rem;
      background-color: rgba(59, 130, 246, 0.1);
      color: hsl(var(--primary));
      border-radius: 9999px;
      font-size: 0.875rem;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .testimonials-title {
      font-size: 2.25rem;
      font-weight: 700;
      color: hsl(var(--foreground));
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .testimonials-title {
        font-size: 3rem;
      }
    }

    .testimonials-subtitle {
      color: hsl(var(--muted-foreground));
      font-size: 1.125rem;
      max-width: 42rem;
      margin: 0 auto;
    }

    .testimonials-content {
      max-width: 48rem;
      margin: 0 auto;
    }

    .testimonials-slider {
      position: relative;
    }

    .testimonials-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 20;
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 9999px;
      background-color: hsl(var(--background));
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      border: 1px solid hsl(var(--border));
      display: flex;
      align-items: center;
      justify-content: center;
      color: hsl(var(--foreground));
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .testimonials-nav:hover {
      background-color: hsl(var(--muted));
      transform: translateY(-50%) scale(1.1);
    }

    .testimonials-nav-prev {
      left: 0;
      transform: translateY(-50%) translateX(-1rem);
    }

    @media (min-width: 768px) {
      .testimonials-nav-prev {
        transform: translateY(-50%) translateX(-3rem);
      }
    }

    .testimonials-nav-next {
      right: 0;
      transform: translateY(-50%) translateX(1rem);
    }

    @media (min-width: 768px) {
      .testimonials-nav-next {
        transform: translateY(-50%) translateX(3rem);
      }
    }

    .testimonials-nav-icon {
      width: 1rem;
      height: 1rem;
    }

    .testimonials-card {
      position: relative;
      padding: 0;
      width: 100%;
    }

    .testimonial-item {
      opacity: 0;
      transform: translateX(0);
      transition: opacity 0.3s ease, transform 0.3s ease;
      width: 100%;
    }

    .testimonial-item.active {
      opacity: 1;
      transform: translateX(0);
    }

    #{{ $id }} .anim-left {
      opacity: 0;
      transform: translateX(-20px);
    }

    #{{ $id }} .anim-right {
      opacity: 0;
      transform: translateX(20px);
    }

    .testimonials-indicators {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      margin-top: 2.5rem;
    }

    .testimonial-indicator {
      height: 0.5rem;
      border-radius: 9999px;
      transition: all 0.5s ease;
      width: 0.5rem;
      background-color: rgba(34, 34, 34, 0.2);
      border: none;
      cursor: pointer;
      padding: 0;
    }

    .testimonial-indicator:hover {
      background-color: rgba(34, 34, 34, 0.4);
    }

    .testimonial-indicator.indicator-active,
    .testimonial-indicator.active-indicator {
      width: 2.5rem;
      background: linear-gradient(to right, hsl(var(--primary)), hsl(var(--accent)));
    }

    .testimonial-indicator.w-10 {
      width: 2.5rem;
    }

    .testimonial-indicator.w-2 {
      width: 0.5rem;
    }

    .testimonial-indicator.bg-foreground\/20 {
      background-color: rgba(34, 34, 34, 0.2);
    }

    /* Testimonial Card Styling */
    .testimonial-item > div {
      background-color: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(8px);
      border-radius: 1rem;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      border: 1px solid rgba(229, 231, 235, 0.5);
      padding: 1.5rem;
      position: relative;
    }

    @media (min-width: 768px) {
      .testimonial-item > div {
        padding: 2.5rem;
      }
    }

    /* Quote Icon */
    .testimonial-item > div > div:first-child {
      position: absolute;
      top: -1rem;
      left: 2rem;
      width: 2.25rem;
      height: 2.25rem;
      border-radius: 0.75rem;
      background: linear-gradient(to bottom right, hsl(var(--primary)), rgba(59, 130, 246, 0.7));
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 768px) {
      .testimonial-item > div > div:first-child {
        left: 2.5rem;
      }
    }

    .testimonial-item > div > div:first-child svg {
      width: 1rem;
      height: 1rem;
      color: white;
      fill: white;
    }

    /* Stars Container */
    .testimonial-item div.flex.gap-0\.5 {
      display: flex;
      gap: 0.125rem;
      margin-bottom: 1rem;
      padding-top: 0.75rem;
    }

    .testimonial-item div.flex.gap-0\.5 svg {
      width: 1rem;
      height: 1rem;
      fill: hsl(var(--primary));
      color: hsl(var(--primary));
    }

    /* Quote Text */
    .testimonial-item blockquote {
      color: hsl(var(--foreground));
      line-height: 1.625;
      font-weight: 500;
    }

    /* Author Section */
    .testimonial-item div.flex.items-center.gap-3 {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .testimonial-item div.relative div.w-11 {
      position: relative;
      width: 2.75rem;
      height: 2.75rem;
      border-radius: 0.75rem;
      background: linear-gradient(to bottom right, rgba(59, 130, 246, 0.2), rgba(244, 63, 94, 0.2));
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .testimonial-item div.relative div.w-11 span {
      font-size: 1.125rem;
      font-weight: 700;
      background: linear-gradient(to bottom right, hsl(var(--primary)), hsl(var(--accent)));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .testimonial-item div.absolute {
      position: absolute;
      bottom: -0.125rem;
      right: -0.125rem;
      width: 0.875rem;
      height: 0.875rem;
      background-color: hsl(var(--primary));
      border-radius: 9999px;
      border: 2px solid hsl(var(--background));
    }

    .testimonial-item div > div:last-child p {
      margin: 0;
    }

    .testimonial-item div > div:last-child p:first-child {
      font-weight: 700;
      font-size: 0.875rem;
      color: hsl(var(--foreground));
    }

    .testimonial-item div > div:last-child p:nth-child(2) {
      color: hsl(var(--muted-foreground));
      font-size: 0.75rem;
    }

    .testimonial-item div > div:last-child p:nth-child(3) {
      font-size: 0.75rem;
      color: hsl(var(--primary));
      font-weight: 500;
    }

  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const root = document.getElementById('{{ $id }}');
      if (!root) return;

      const items = Array.from(root.querySelectorAll('.testimonial-item'));
      const prevBtn = root.querySelector('[data-action="prev"]');
      const nextBtn = root.querySelector('[data-action="next"]');
      const indicators = Array.from(root.querySelectorAll('.testimonial-indicator'));

      let current = 0;
      let isAnimating = false;
      const intervalMs = 6000;
      let interval = null;

      function show(index, dir = 'right') {
        if (isAnimating || index === current) return;
        isAnimating = true;

        const outgoing = items[current];
        const incoming = items[index];

        outgoing.classList.remove('active');
        outgoing.classList.add(dir === 'right' ? 'anim-left' : 'anim-right');

        incoming.style.display = 'block';
        incoming.classList.add(dir === 'right' ? 'anim-right' : 'anim-left');

        // force reflow
        void incoming.offsetWidth;

        incoming.classList.remove('anim-left', 'anim-right');
        incoming.classList.add('active');

        // update indicators
        indicators.forEach((btn, i) => {
          if (i === index) {
            btn.classList.add('indicator-active', 'w-10');
            btn.classList.remove('w-2', 'bg-foreground/20');
          } else {
            btn.classList.remove('indicator-active', 'w-10');
            btn.classList.add('w-2', 'bg-foreground/20');
          }
        });

        setTimeout(() => {
          outgoing.style.display = 'none';
          current = index;
          isAnimating = false;
        }, 300);
      }

      function goNext() { show((current + 1) % items.length, 'right'); }
      function goPrev() { show((current - 1 + items.length) % items.length, 'left'); }

      nextBtn.addEventListener('click', () => { clearInterval(interval); goNext(); interval = setInterval(goNext, intervalMs); });
      prevBtn.addEventListener('click', () => { clearInterval(interval); goPrev(); interval = setInterval(goNext, intervalMs); });

      indicators.forEach(btn => {
        btn.addEventListener('click', (e) => {
          const idx = parseInt(btn.getAttribute('data-indicator-index'));
          if (isNaN(idx)) return;
          clearInterval(interval);
          show(idx, idx > current ? 'right' : 'left');
          interval = setInterval(goNext, intervalMs);
        });
      });

      // start autoplay
      interval = setInterval(goNext, intervalMs);
    });
  </script>
</section>

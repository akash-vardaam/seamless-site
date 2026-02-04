@php
  $features = [
    [
      'id' => 'seamless',
      'title' => 'Seamless',
      'subtitle' => 'Continuity across the entire member journey.',
      'description' => 'Membership should feel continuous — not transactional. Seamless removes friction across the entire member journey, from joining and renewal to events, learning, and ongoing engagement. Every interaction feels connected, consistent, and intentional. Members do not experience systems. They experience continuity.',
    ],
    [
      'id' => 'unified',
      'title' => 'Unified',
      'subtitle' => 'One source of truth powering every experience.',
      'description' => 'A single platform that connects your website, member portal, events, learning, and backend operations. No more juggling multiple systems or syncing data between disconnected tools.',
    ],
    [
      'id' => 'adaptive',
      'title' => 'Adaptive',
      'subtitle' => 'Designed to evolve without disruption.',
      'description' => 'Your organization will change. Your platform should change with you. Adaptive architecture means you can grow, pivot, and innovate without costly migrations or platform overhauls.',
    ],
  ];

  $id = 'features-' . uniqid();
@endphp

<section id="{{ $id }}" class="features-section"
  style="background-image: url('{{ asset('assets/section-4-bg.png') }}')">
  <div class="features-container">
    <div class="features-content">
      @foreach($features as $idx => $feature)
        <x-ui-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
          <div class="feature-item" data-feature-id="{{ $feature['id'] }}">
            <button class="feature-toggle">
              <div class="feature-header">
                <span class="feature-title">{{ $feature['title'] }}</span>
                <span class="feature-divider">|</span>
                <span class="feature-subtitle">{{ $feature['subtitle'] }}</span>
              </div>
              <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>

            <div class="feature-content {{ $idx === 0 ? 'expanded' : '' }}">
              <p class="feature-description">{{ $feature['description'] }}</p>
            </div>
          </div>
        </x-ui-scroll-animate>
      @endforeach

      <x-ui-scroll-animate animation="fade-up" delay="400">
        <div class="features-cta">
          <a href="{{ route('request-demo') }}" class="btn-outline">Request a Demo</a>
          <a href="{{ route('features') }}" class="btn-cta">Explore Features</a>
        </div>
      </x-ui-scroll-animate>
    </div>
  </div>

  <style>
    .features-section {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .features-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 5rem 1.5rem;
    }

    .features-content {
      max-width: 48rem;
      margin: 0 auto;
    }

    .feature-item {
      border-bottom: 1px solid rgba(34, 34, 34, 0.1);
      padding: 1.5rem 0;
    }

    .feature-toggle {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      text-align: left;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
    }

    .feature-header {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      flex-wrap: wrap;
    }

    .feature-title {
      font-family: Aspira,Inter,sans-serif;
      font-size: 1.25rem;
      color: hsl(var(--foreground));
    }

    .feature-divider {
      color: hsl(var(--muted-foreground));
    }

    .feature-subtitle {
      font-size: 1rem;
      color: hsl(var(--muted-foreground));
    }

    .feature-icon {
      width: 1.5rem;
      height: 1.5rem;
      color: hsl(var(--secondary));
      transition: transform 0.3s ease;
      flex-shrink: 0;
    }

    .feature-toggle:hover .feature-icon {
      color: hsl(var(--secondary));
    }

    .feature-item.active .feature-icon {
      transform: rotate(45deg);
    }

    .feature-content {
      overflow: hidden;
      transition: all 0.5s ease-out;
      max-height: 0;
      opacity: 0;
    }

    .feature-content.expanded {
      max-height: 400px;
      opacity: 1;
    }

    .feature-description {
      font-size: 1rem;
      color: hsl(var(--muted-foreground));
      padding-left: 0;
      padding-top: 1rem;
    }

    @media (min-width: 768px) {
      .feature-description {
        padding-left: 1rem;
      }
    }

    .features-cta {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      justify-content: center;
      margin-top: 3rem;
    }

    @media (min-width: 640px) {
      .features-cta {
        flex-direction: row;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const root = document.getElementById('{{ $id }}');
      if (!root) return;

      const items = Array.from(root.querySelectorAll('.feature-item'));
      const toggles = Array.from(root.querySelectorAll('.feature-toggle'));

      // Set initial expanded state (first item or 'seamless')
      const firstItem = items.find(item => item.dataset.featureId === 'seamless') || items[0];
      if (firstItem) {
        firstItem.classList.add('active');
        firstItem.querySelector('.feature-content').classList.add('expanded');
      }

      toggles.forEach((toggle, idx) => {
        toggle.addEventListener('click', function () {
          const item = items[idx];
          const content = item.querySelector('.feature-content');
          const isExpanded = item.classList.contains('active');

          // Close all others
          items.forEach((i, idxInner) => {
            i.classList.remove('active');
            i.querySelector('.feature-content').classList.remove('expanded');
          });

          // Toggle current if not already expanded
          if (!isExpanded) {
            item.classList.add('active');
            content.classList.add('expanded');
          }
        });
      });
    });
  </script>
</section>
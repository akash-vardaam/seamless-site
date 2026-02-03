@extends('layouts.app')

@section('title', 'Pricing - Seamless')

@push('styles')
<style>
  .pricing-slider {
    -webkit-appearance: none;
    appearance: none;
    width: 100%;
    height: 8px;
    border-radius: 5px;
    background: linear-gradient(to right, hsl(var(--primary)), hsl(var(--primary)));
    outline: none;
    cursor: pointer;
  }
  
  .pricing-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: hsl(var(--primary));
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    transition: transform 0.2s;
  }
  
  .pricing-slider::-webkit-slider-thumb:hover {
    transform: scale(1.1);
  }
  
  .pricing-slider::-moz-range-thumb {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: hsl(var(--primary));
    cursor: pointer;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    transition: transform 0.2s;
  }
  
  .pricing-slider::-moz-range-thumb:hover {
    transform: scale(1.1);
  }
  
  .feature-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: hsl(var(--primary) / 0.1);
    transition: background-color 0.3s;
  }
  
  .feature-card:hover .feature-icon {
    background-color: hsl(var(--primary) / 0.2);
  }
  
  .accordion-header {
    cursor: pointer;
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    user-select: none;
  }
  
  .accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding: 0 24px;
  }
  
  .accordion-item.active .accordion-content {
    max-height: 500px;
    padding: 0 24px 24px 24px;
  }
  
  .accordion-icon {
    width: 24px;
    height: 24px;
    transition: transform 0.3s;
  }
  
  .accordion-item.active .accordion-icon {
    transform: rotate(180deg);
  }
</style>
@endpush

@section('content')

@php
  $pricingTiers = [
    ['revenue' => 'Under $250K', 'price' => '$750'],
    ['revenue' => '$250K – $500K', 'price' => '$950'],
    ['revenue' => '$500K – $1M', 'price' => '$1,250'],
    ['revenue' => '$1M – $2M', 'price' => '$1,650'],
    ['revenue' => '$2M – $3.5M', 'price' => '$2,250'],
    ['revenue' => '$3.5M – $5M', 'price' => '$2,950'],
    ['revenue' => '$5M – $7.5M', 'price' => '$3,650'],
    ['revenue' => '$7.5M+', 'price' => 'Custom'],
  ];

  $includedFeatures = [
    ['title' => 'Membership lifecycle management', 'description' => 'From onboarding to renewal'],
    ['title' => 'Member-aware events & registrations', 'description' => 'Pricing that recognizes members'],
    ['title' => 'Learning, CEUs & credentials', 'description' => 'Professional development built-in'],
    ['title' => 'Website integrations', 'description' => 'WordPress, Wix, Webflow'],
    ['title' => 'Reporting, APIs & Single Sign-On', 'description' => 'Connect and analyze everything'],
    ['title' => 'Ongoing updates & support', 'description' => "We're with you for the long haul"],
  ];

  $implementationTiers = [
    ['name' => 'Core Implementation', 'price' => '$7,500'],
    ['name' => 'Advanced Migration & Integrations', 'price' => '$12,000–$18,000'],
    ['name' => 'Enterprise / Multi-System', 'price' => '$20,000+'],
  ];

  $faqs = [
    ['question' => 'Why is pricing based on annual revenue?', 'answer' => 'Annual organizational revenue is a transparent, publicly available metric that reflects the true scale and complexity of your operations. It ensures pricing is fair and proportional — without arbitrary feature gates or usage limits.'],
    ['question' => 'Do features change by pricing tier?', 'answer' => 'No. Every Seamless subscription includes the full platform. There are no modules to unlock, no premium tiers, and no feature negotiations. You get everything from day one.'],
    ['question' => 'What happens if our revenue changes?', 'answer' => "Pricing adjusts at renewal to reflect your organization's growth. There are no mid-term disruptions, surprise fees, or forced migrations. Seamless scales with you."],
    ['question' => 'Is there a long-term contract?', 'answer' => 'Seamless subscriptions are billed annually. We believe in earning your trust year over year through transparency, reliability, and ongoing value — not lock-in.'],
    ['question' => 'Does Seamless support modern websites?', 'answer' => 'Yes. Seamless integrates directly with WordPress, Wix, and Webflow, allowing you to maintain a modern web presence while running your membership operations from a unified backend.'],
    ['question' => 'What support is included?', 'answer' => 'Professional onboarding and ongoing support are included at every subscription level. Our team is committed to helping you succeed — not upselling you on support packages.'],
  ];
@endphp

<!-- Hero Section -->
<section class="relative pt-40 pb-32 overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/inner-page-header.png') }}');">
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/20"></div>
  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-4xl mx-auto text-center scroll-animate">
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 tracking-tight">
        Transparent pricing, designed to <span class="text-accent">scale with you.</span>
      </h1>
      <p class="text-xl md:text-2xl text-white/90 mb-10 font-light">
        Seamless pricing is based on annual organizational revenue — a clear, public indicator of scale.
      </p>
      <div class="flex justify-center">
        <a href="{{ route('request-demo') }}" class="btn-cta">
          Request a Demo
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Tiers Section -->
<section class="py-24 md:py-32">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16 scroll-animate">
      <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">
        Seamless Platform Subscription
      </h2>
      <p class="text-xl text-muted-foreground">
        Billed annually. Full platform included at every level.
      </p>
    </div>

    <div class="max-w-2xl mx-auto scroll-animate" style="animation-delay: 100ms;">
      <!-- Price Display -->
      <div class="text-center mb-12">
        <div id="priceDisplay" class="text-6xl md:text-7xl font-bold text-primary mb-2">
          $1,650<span class="text-2xl font-normal text-muted-foreground ml-2">/ month</span>
        </div>
        <div id="revenueDisplay" class="text-xl text-foreground">
          $1M – $2M annual revenue
        </div>
      </div>

      <!-- Slider -->
      <div class="px-4 mb-8">
        <input 
          type="range" 
          id="pricingSlider" 
          class="pricing-slider w-full"
          min="0" 
          max="7" 
          value="3" 
          step="1"
        />
        <div class="flex justify-between mt-4 text-sm text-muted-foreground">
          <span>Under $250K</span>
          <span>$7.5M+</span>
        </div>
      </div>

      <!-- Tier Indicators -->
      <div class="flex justify-center gap-2 mb-12">
        @for ($i = 0; $i < count($pricingTiers); $i++)
          <button 
            class="tier-indicator w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 3 ? 'bg-primary scale-125' : 'bg-border hover:bg-muted-foreground/50' }}"
            data-tier="{{ $i }}"
            aria-label="Select {{ $pricingTiers[$i]['revenue'] }} tier"
          ></button>
        @endfor
      </div>

      <div class="text-center">
        <a href="{{ route('request-demo') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-primary-foreground rounded-full font-semibold transition-all duration-300 hover:bg-primary/90 hover:shadow-xl mx-auto">
          Request a Demo
          <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </a>
        <p class="text-sm text-muted-foreground mt-4">
          or <a href="#" class="text-primary hover:underline">Talk with Our Team</a>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- What's Included Section -->
<section class="py-24 md:py-32 relative overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/section-6-bg.png') }}');">
  <div class="absolute inset-0 bg-white/60"></div>
  
  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16 scroll-animate">
      <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">
        What every Seamless subscription includes
      </h2>
      <p class="text-lg text-muted-foreground">
        Full platform access at every tier
      </p>
    </div>

    <div class="max-w-5xl mx-auto">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
        @foreach ($includedFeatures as $index => $feature)
          <div class="feature-card group p-6 rounded-2xl bg-background border border-border/50 hover:border-primary/30 hover:shadow-lg transition-all duration-300 scroll-animate" style="animation-delay: {{ $index * 100 }}ms;">
            <div class="feature-icon mb-4">
              @if ($feature['title'] === 'Membership lifecycle management')
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              @elseif ($feature['title'] === 'Member-aware events & registrations')
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
              @elseif ($feature['title'] === 'Learning, CEUs & credentials')
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.25c0 5.105 3.07 9.408 7.5 11.398m0-13c5.5 0 10 4.745 10 10.997v13m0-13C17.5 6.253 21 10.998 21 17.25"/>
                </svg>
              @elseif ($feature['title'] === 'Website integrations')
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9-9a9 9 0 019 9"/>
                </svg>
              @elseif ($feature['title'] === 'Reporting, APIs & Single Sign-On')
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
              @else
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              @endif
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-2">
              {{ $feature['title'] }}
            </h3>
            <p class="text-muted-foreground text-sm">
              {{ $feature['description'] }}
            </p>
          </div>
        @endforeach
      </div>

      <div class="text-center scroll-animate" style="animation-delay: 600ms;">
        <div class="inline-flex items-center gap-8 px-8 py-4 rounded-full bg-background border border-border/50">
          <span class="flex items-center gap-2 text-foreground">
            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
            </svg>
            No modules
          </span>
          <span class="flex items-center gap-2 text-foreground">
            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
            </svg>
            No feature gates
          </span>
          <span class="flex items-center gap-2 text-foreground">
            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
            </svg>
            No surprises
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Implementation Section -->
<section class="py-24 md:py-32">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto scroll-animate">
      <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">
          Implementation & Onboarding
        </h2>
        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
          Onboarding is a structured implementation process designed to unify data, workflows, and digital experiences — not a quick setup.
        </p>
      </div>

      <div class="space-y-1 mb-8">
        @foreach ($implementationTiers as $index => $tier)
          <div class="flex items-center justify-between py-5 px-6 border-b border-border/50 scroll-animate" style="animation-delay: {{ $index * 100 }}ms;">
            <span class="text-lg text-foreground">
              {{ $tier['name'] }}
            </span>
            <span class="text-xl font-bold text-primary">
              {{ $tier['price'] }}
            </span>
          </div>
        @endforeach
      </div>

      <p class="text-center text-muted-foreground text-lg scroll-animate" style="animation-delay: 300ms;">
        We don't rush onboarding. We get it right.
      </p>
    </div>
  </div>
</section>

<!-- Testimonial Section -->
<section class="py-24 md:py-32 bg-muted/30">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto text-center scroll-animate">
      <blockquote class="text-2xl md:text-3xl font-bold text-foreground leading-relaxed mb-8">
        "Moving to Seamless gave us clarity we didn't know we were missing. Our team spends less time managing systems and more time serving members."
      </blockquote>
      <p class="text-muted-foreground">
        — Operations Director, Professional Association
      </p>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-24 md:py-32">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16 scroll-animate">
      <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">
        Frequently Asked Questions
      </h2>
    </div>

    <div class="max-w-3xl mx-auto space-y-4">
      @foreach ($faqs as $index => $faq)
        <div class="accordion-item border border-border/50 rounded-lg scroll-animate" style="animation-delay: {{ $index * 100 }}ms;" data-index="{{ $index }}">
          <div class="accordion-header" onclick="toggleAccordion(this)">
            <span class="text-lg font-medium">{{ $faq['question'] }}</span>
            <svg class="accordion-icon text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
          </div>
          <div class="accordion-content text-muted-foreground text-base leading-relaxed">
            {{ $faq['answer'] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Closing Section -->
<section class="py-24 md:py-32 bg-gradient-to-br from-primary via-primary to-secondary relative overflow-hidden">
  <div class="absolute top-0 left-1/4 w-96 h-96 bg-secondary/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-3xl mx-auto text-center scroll-animate">
      <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
        Built for organizations that plan to grow.
      </h2>
      <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto">
        Seamless is designed to support membership organizations over time — without forcing replatforming or renegotiation.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('request-demo') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary rounded-full font-semibold transition-all duration-300 hover:bg-white/90 hover:shadow-xl">
          Request a Demo
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </a>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 border border-white/30 text-white rounded-full font-medium transition-all duration-300 hover:bg-white/10 hover:border-white/50">
          Contact Us
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  const pricingTiers = @json($pricingTiers);
  
  const slider = document.getElementById('pricingSlider');
  const priceDisplay = document.getElementById('priceDisplay');
  const revenueDisplay = document.getElementById('revenueDisplay');
  const indicators = document.querySelectorAll('.tier-indicator');

  function updatePricing(index) {
    const tier = pricingTiers[index];
    const price = tier.price;
    const displayPrice = price === 'Custom' ? price : price + '<span class="text-2xl font-normal text-muted-foreground ml-2">/ month</span>';
    
    priceDisplay.innerHTML = displayPrice;
    revenueDisplay.textContent = tier.revenue + ' annual revenue';

    // Update indicators
    indicators.forEach((indicator, i) => {
      if (i === index) {
        indicator.classList.remove('bg-border', 'hover:bg-muted-foreground/50');
        indicator.classList.add('bg-primary', 'scale-125');
      } else {
        indicator.classList.add('bg-border', 'hover:bg-muted-foreground/50');
        indicator.classList.remove('bg-primary', 'scale-125');
      }
    });
  }

  slider.addEventListener('input', (e) => {
    updatePricing(parseInt(e.target.value));
  });

  indicators.forEach((indicator) => {
    indicator.addEventListener('click', (e) => {
      const tier = parseInt(e.target.dataset.tier);
      slider.value = tier;
      updatePricing(tier);
    });
  });

  // Scroll animation
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, observerOptions);

  document.querySelectorAll('.scroll-animate').forEach(el => {
    observer.observe(el);
  });

  // Accordion toggle
  function toggleAccordion(header) {
    const item = header.parentElement;
    const isActive = item.classList.contains('active');
    
    // Close all other accordions
    document.querySelectorAll('.accordion-item.active').forEach(el => {
      if (el !== item) {
        el.classList.remove('active');
      }
    });
    
    // Toggle current
    item.classList.toggle('active');
  }
</script>
@endpush

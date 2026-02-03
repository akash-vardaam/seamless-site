@extends('layouts.app')

@section('title', 'Integrations - Seamless')
@section('description', 'Connect Seamless with the tools you already use to create a unified management ecosystem.')

@push('styles')
<style>
  .text-gradient { background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary))); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .btn-outline { display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 1rem 2rem; border: 2px solid hsl(var(--foreground)); color: hsl(var(--foreground)); border-radius: 9999px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; background: transparent; cursor: pointer; }
  .btn-outline:hover { background-color: hsl(var(--foreground)); color: hsl(var(--background)); }
  
  .accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
  }
  
  .integration-accordion.active .accordion-content {
    max-height: 500px;
  }
  
  .accordion-icon {
    transition: transform 0.3s ease;
  }
  
  .integration-accordion.active .accordion-icon {
    transform: rotate(180deg);
  }
</style>
@endpush

@section('content')
@php
  $stats = [
    ['value' => '15+', 'label' => 'Years of Experience'],
    ['value' => '40%', 'label' => 'Month-over-Month Growth'],
    ['value' => '50K+', 'label' => 'Successful Events'],
    ['value' => '24', 'label' => 'Response Time (Hours)'],
  ];

  $documentationCards = [
    ['title' => 'Getting Started', 'description' => 'Learn the basics and set up your first integration in minutes.', 'icon' => 'book'],
    ['title' => 'API Reference', 'description' => 'Complete API documentation with code examples and endpoints.', 'icon' => 'code'],
    ['title' => 'Integration Guides', 'description' => 'Step-by-step guides for connecting your favorite tools.', 'icon' => 'file'],
    ['title' => 'Best Practices', 'description' => 'Tips and strategies for optimizing your workflow.', 'icon' => 'lightbulb'],
    ['title' => 'Video Tutorials', 'description' => 'Watch our video series to master every feature of Seamless.', 'icon' => 'play'],
    ['title' => 'Developer Tools', 'description' => 'SDKs, webhooks, and developer resources for custom integrations.', 'icon' => 'wrench'],
  ];

  $integrationCategories = [
    ['title' => 'Accounting', 'description' => 'Remove risk, improve accuracy, and save staff time while maintaining impeccable books.', 'tools' => ['QuickBooks', 'Stripe', 'QuickBooks Payments']],
    ['title' => 'Analytics & Reporting', 'description' => 'Make more effective business decisions with advanced data analytics.', 'tools' => ['Google Analytics']],
    ['title' => 'Automation & Productivity', 'description' => 'Connect your member data to automate workflows and keep data synchronized.', 'tools' => ['Asana', 'Dropbox', 'Excel', 'Google Calendar', 'Google Drive', 'Slack', 'Trello', 'Zapier', 'Salesforce', 'Microsoft Teams']],
    ['title' => 'Online Community', 'description' => 'Connect with your members and help them connect with one another.', 'tools' => ['Breezio', 'Forj', 'Higher Logic Thrive', 'Sengii']],
    ['title' => 'Event Management', 'description' => 'Augment native event management with specialized event platforms.', 'tools' => ['Cvent', 'CrowdCompass', 'eShow', 'Fielddrive', 'Map Dynamics', 'MobileUp', 'Showcare', 'Streampoint']],
    ['title' => 'Learning Management', 'description' => 'Take your educational programs online with a full-featured LMS.', 'tools' => ['BlueSky eLearn', 'Brightspace', 'Docebo', 'LearnUpon', 'MapleLMS', 'Oasis LMS']],
    ['title' => 'Marketing & Communications', 'description' => 'Create authentic two-way communication with your members at scale.', 'tools' => ['Mailchimp', 'Constant Contact', 'HubSpot', 'SendGrid', 'Gmail', 'Office 365', 'SurveyMonkey', 'Vimeo', 'YouTube', 'WordPress']],
    ['title' => 'Video Conferencing', 'description' => 'Gather your members virtually for education, networking, or governance meetings.', 'tools' => ['Zoom', 'Webex', 'GoToWebinar']],
  ];

  $id = 'integrations-' . uniqid();
@endphp

<div class="min-h-screen bg-background">
  <!-- Hero Section -->
  <section class="relative pt-40 pb-32 overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-background/20"></div>
    <div class="container mx-auto px-6 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <x-scroll-animate animation="fade-up">
          <h1 class="text-5xl md:text-6xl lg:text-7xl font-display text-white mb-6 tracking-tight">
            Seamless Management, <span class="text-accent">Successful Events</span>
          </h1>
        </x-scroll-animate>

        <x-scroll-animate animation="fade-up" delay="100">
          <p class="text-xl md:text-2xl text-white/90 mb-8 font-light max-w-3xl mx-auto">
            Connect Seamless with the tools you already use to create a unified management ecosystem.
          </p>
        </x-scroll-animate>

        <x-scroll-animate animation="fade-up" delay="200">
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="group px-8 py-4 bg-white text-primary rounded-full font-semibold transition-all duration-300 hover:bg-white/90 hover:shadow-xl flex items-center justify-center gap-2">
              Explore Integrations
              <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </button>
            <button class="px-8 py-4 border border-white/30 text-white rounded-full font-medium transition-all duration-300 hover:bg-white/10 hover:border-white/50">View Documentation</button>
          </div>
        </x-scroll-animate>
      </div>
    </div>
  </section>

  <!-- Connect with Leading Software -->
  <section class="py-28 md:py-36 relative overflow-hidden">
    <div class="container mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <x-scroll-animate animation="fade-right">
          <div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-display text-foreground mb-6">
              Connect with Leading Software
              <span class="text-gradient"> Effortlessly</span>
            </h2>
            <p class="text-muted-foreground text-lg mb-6">
              Seamless links with top-tier software providers through powerful APIs and seamless integrations.
            </p>
            <p class="text-muted-foreground">
              The result? A platform that combines the ease of an all-in-one solution with the flexibility to leverage the best tools for every task — giving you efficiency without compromise.
            </p>
          </div>
        </x-scroll-animate>

        <x-scroll-animate animation="fade-left" delay="100">
          <div class="relative">
            <div class="absolute -inset-4 bg-gradient-to-r from-primary/20 via-secondary/20 to-primary/20 rounded-3xl blur-2xl opacity-50"></div>
            <video autoplay muted loop playsinline class="relative rounded-2xl shadow-2xl border border-border/50">
              <source src="{{ asset('videos/product-demo.mp4') }}" type="video/mp4" />
            </video>
          </div>
        </x-scroll-animate>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-16 bg-muted/30">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($stats as $idx => $stat)
          <x-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
            <div class="text-center">
              <div class="text-4xl md:text-5xl font-display font-bold text-primary mb-2">{{ $stat['value'] }}</div>
              <div class="text-muted-foreground text-sm">{{ $stat['label'] }}</div>
            </div>
          </x-scroll-animate>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Documentation Section -->
  <section class="py-28 md:py-36 relative overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/section-6-bg.png') }}')">
    <div class="container mx-auto px-6 relative">
      <x-scroll-animate animation="fade-up">
        <div class="text-center mb-16">
          <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium bg-accent/10 text-accent mb-6">Integration Tools</span>
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-display text-foreground mb-4">Comprehensive Documentation</h2>
          <p class="text-muted-foreground max-w-2xl mx-auto text-lg">
            Everything you need to integrate, customize, and optimize your management platform.
          </p>
        </div>
      </x-scroll-animate>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
        @foreach($documentationCards as $idx => $card)
          <x-scroll-animate animation="fade-up" delay="{{ $idx * 75 }}">
            <div class="group p-8 rounded-2xl bg-background border border-border/50 shadow-sm hover:shadow-lg hover:border-primary/20 transition-all duration-300 hover:-translate-y-1">
              <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                @if($card['icon'] === 'book')
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.5S6.5 28.747 12 28.747s10-4.745 10-10.247S17.5 6.253 12 6.253z"/></svg>
                @elseif($card['icon'] === 'code')
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l-4 4m4-4H3"/></svg>
                @elseif($card['icon'] === 'file')
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                @elseif($card['icon'] === 'lightbulb')
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5.36 4.24l-.707-.707M9 12a3 3 0 106 0 3 3 0 00-6 0z"/></svg>
                @elseif($card['icon'] === 'play')
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                @else
                  <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                @endif
              </div>
              <h3 class="text-xl font-display text-foreground mb-3">{{ $card['title'] }}</h3>
              <p class="text-muted-foreground text-sm mb-4">{{ $card['description'] }}</p>
              <button class="text-primary text-sm font-medium hover:underline inline-flex items-center gap-1">
                Learn More
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
              </button>
            </div>
          </x-scroll-animate>
        @endforeach
      </div>

      <x-scroll-animate animation="fade-up" delay="500">
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
          <button class="btn-outline">View Full Documentation</button>
          <a href="{{ route('contact') }}" class="btn-cta inline-block">Contact Support</a>
        </div>
      </x-scroll-animate>
    </div>
  </section>

  <!-- Featured Integrations -->
  <section id="{{ $id }}" class="py-28 md:py-36 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-secondary/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <div class="container mx-auto px-6 relative">
      <x-scroll-animate animation="fade-up">
        <div class="text-center mb-16">
          <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium bg-primary/10 text-primary mb-6">Featured Integrations</span>
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-display text-foreground mb-4">Expand Your Ecosystem</h2>
          <p class="text-muted-foreground max-w-3xl mx-auto text-lg">
            Building successful organizations requires a connected workflow where data flows freely between your favorite tools.
          </p>
        </div>
      </x-scroll-animate>

      <x-scroll-animate animation="fade-up">
        <div class="max-w-5xl mx-auto space-y-4">
          @foreach($integrationCategories as $idx => $cat)
            <div class="integration-accordion rounded-2xl bg-gradient-to-br from-muted/50 to-muted/20 border border-border/30 overflow-hidden {{ $idx === 0 ? 'active' : '' }}" data-index="{{ $idx }}" onclick="toggleIntegrationAccordion(this)">
              <button class="accordion-trigger w-full py-6 px-8 text-left hover:bg-muted/30 transition-colors flex items-start justify-between cursor-pointer">
                <div>
                  <h3 class="text-2xl font-display text-foreground">{{ $cat['title'] }}</h3>
                  <p class="text-muted-foreground text-sm mt-1">{{ $cat['description'] }}</p>
                </div>
                <svg class="accordion-icon w-6 h-6 text-primary flex-shrink-0 ml-4 {{ $idx === 0 ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
              </button>
              <div class="accordion-content {{ $idx === 0 ? '' : '' }}">
                <div class="pb-8 px-8 pt-4 flex flex-wrap gap-3">
                  @foreach($cat['tools'] as $tool)
                    <span class="px-4 py-2 rounded-full bg-background border border-border/50 text-sm text-foreground hover:border-primary/30 hover:bg-primary/5 transition-colors cursor-pointer">
                      {{ $tool }}
                    </span>
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </x-scroll-animate>
    </div>
  </section>

  <!-- Closing CTA -->
  <section class="py-28 md:py-36 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary to-secondary"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
      <x-scroll-animate animation="fade-up">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-display text-primary-foreground mb-8">
            Ready to connect your ecosystem?
          </h2>

          <p class="text-white/70 text-lg md:text-xl leading-relaxed mb-12">
            Our integrations enable seamless data flow between platforms, eliminating manual work and ensuring your information stays synchronized across all your essential business tools.
          </p>

          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('request-demo') }}" class="group px-8 py-4 bg-white text-primary rounded-full font-semibold transition-all duration-300 hover:bg-white/90 hover:shadow-xl hover:-translate-y-0.5 flex items-center justify-center gap-2 text-center">
              Request a Demo
              <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-4 border-2 border-white/30 text-primary-foreground rounded-full font-semibold transition-all duration-300 hover:bg-white/10 hover:border-white/50 text-center">
              Contact Sales
            </a>
          </div>
        </div>
      </x-scroll-animate>
    </div>
  </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Scroll animation observer
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(element => {
      observer.observe(element);
    });
  });

  // Toggle integration accordion
  function toggleIntegrationAccordion(accordion) {
    const isActive = accordion.classList.contains('active');
    
    // Close all other accordions
    document.querySelectorAll('.integration-accordion.active').forEach(el => {
      if (el !== accordion) {
        el.classList.remove('active');
      }
    });
    
    // Toggle current
    accordion.classList.toggle('active');
  }
</script>
@endsection

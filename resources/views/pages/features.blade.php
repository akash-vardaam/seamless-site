@extends('layouts.app')

@section('title', 'Features - Seamless')

@push('styles')
    <style>
        /* Animations */


        .scroll-animate-scale {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scroll-animate-scale.visible {
            opacity: 1;
            transform: scale(1);
        }

        .animate-delay-75 {
            transition-delay: 0.075s;
        }

        .animate-delay-100 {
            transition-delay: 0.1s;
        }

        .animate-delay-150 {
            transition-delay: 0.15s;
        }

        .animate-delay-200 {
            transition-delay: 0.2s;
        }

        /* Hero Section */
        .feature-hero-section {
            position: relative;
            padding-top: 10rem;
            padding-bottom: 8rem;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent, transparent, hsla(var(--background), 0.2));
        }



        /* Buttons */


        .arrow-icon {
            transition: transform 0.3s ease;
        }

        /* Pattern Background */
        .dot-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.02;
            background-image: radial-gradient(circle at 1px 1px, hsl(var(--foreground)) 1px, transparent 0);
            background-size: 40px 40px;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.375rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .badge-primary {
            background-color: hsla(var(--primary), 0.1);
            color: hsl(var(--primary));
        }

        .badge-accent {
            background-color: hsla(var(--accent), 0.1);
            color: hsl(var(--accent));
        }

        /* Pillar Cards */
        .pillar-card {
            position: relative;
            height: 100%;
        }

        .pillar-card-content {
            position: relative;
            height: 100%;
            padding: 2.5rem;
            border-radius: 1rem;
            background-color: hsl(var(--background));
            border: 1px solid hsla(var(--border), 0.5);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }

        .pillar-card:hover .pillar-card-content {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: hsla(var(--primary), 0.2);
            transform: translateY(-4px);
        }

        .pillar-gradient {
            position: absolute;
            inset: 0;
            border-radius: 1rem;
            background: linear-gradient( to bottom right, #2b4bee0d, transparent, #8c3cdd0d );
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .pillar-card:hover .pillar-gradient {
            opacity: 1;
        }

        .pillar-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, hsla(var(--primary), 0.1), hsla(var(--secondary), 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .pillar-card:hover .pillar-icon {
            transform: scale(1.1);
        }

        /* Capability Cards */
        .capability-card {
            position: relative;
            padding: 2rem;
            border-radius: 1rem;
            background: linear-gradient(to bottom right, hsl(220 14% 96% / .5) , hsl(220 14% 96% / .2));
            border: 1px solid #F7F7F8;
            transition: all 0.3s ease;
        }

        .capability-card:hover {
            border-color: #D5DBFC;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .capability-icon {
            flex-shrink: 0;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px hsla(var(--primary), 0.2);
            transition: transform 0.3s ease;
        }

        .capability-card:hover .capability-icon {
            transform: scale(1.05);
        }

        /* Video Section */
        .video-glow {
            position: absolute;
            inset: -1rem;
            background: linear-gradient(to right, hsla(var(--primary), 0.2), hsla(var(--secondary), 0.2), hsla(var(--primary), 0.2));
            border-radius: 1.5rem;
            filter: blur(40px);
            opacity: 0.5;
            transition: opacity 0.5s ease;
        }

        .video-wrapper:hover .video-glow {
            opacity: 0.75;
        }

        .video-container {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid hsla(var(--border), 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 83%;
            margin: 0 auto;
        }

        /* CTA Section */
        .cta-section {
            position: relative;
            padding: 7rem 0;
            overflow: hidden;
        }

        .cta-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--primary)), hsl(var(--secondary)));
        }

        .cta-glow-1 {
            position: absolute;
            top: 0;
            right: 0;
            width: 24rem;
            height: 24rem;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            filter: blur(80px);
        }

        .cta-glow-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 20rem;
            height: 20rem;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            filter: blur(80px);
        }

        /* Decorative Blobs */
        .blob-primary {
            position: absolute;
            top: 0;
            left: 0;
            width: 24rem;
            height: 24rem;
            background-color: hsla(var(--primary), 0.05);
            border-radius: 50%;
            filter: blur(80px);
            transform: translate(-50%, -50%);
        }

        .blob-secondary {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 24rem;
            height: 24rem;
            background-color: hsla(var(--secondary), 0.05);
            border-radius: 50%;
            filter: blur(80px);
            transform: translate(50%, 50%);
        }

        /* Grid Layouts */
        .grid-3 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .hero-section {
                padding-top: 10rem;
                padding-bottom: 8rem;
            }

            .grid-3 {
                grid-template-columns: repeat(3, 1fr);
            }

            .grid-2 {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        /* Icons */
        .lucide {
            width: 1.5rem;
            height: 1.5rem;
            stroke-width: 2;
        }

        .lucide-sm {
            width: 1rem;
            height: 1rem;
        }

        .lucide-lg {
            width: 1.75rem;
            height: 1.75rem;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="feature-hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
        <div class="hero-gradient"></div>
        <div class="container" style="position: relative; z-index: 10;">
            <div style="max-width: 64rem; margin: 0 auto; text-align: center;">
                <div class="scroll-animate">
                    <h1 class="font-display"
                        style="font-size: clamp(3rem, 6vw, 4.5rem); color: white; margin-bottom: 1.5rem; line-height: 1.1; letter-spacing: -0.02em;">
                        Capabilities <span class="text-accent">that work together.</span>
                    </h1>
                </div>

                <div class="scroll-animate animate-delay-100">
                    <p style="font-size: 1.5rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 1rem; font-weight: 300;">
                        Built around membership. Unified from backend to frontend.
                    </p>
                </div>

                <div class="scroll-animate animate-delay-200">
                    <div
                        style="display: flex; flex-direction: row; gap: 1rem; justify-content: center; align-items: center; margin-top: 2rem;">
                        <a href="#video-section" class="btn-white">
                            See Seamless in Action
                            <svg class="lucide-sm arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#pillars-section" class="btn-secondary">
                            Learn How It Works
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Intro -->
    <section style="padding: 7rem 0; position: relative; overflow: hidden;">
        <div class="dot-pattern"></div>

        <div class="container" style="position: relative;">
            <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.875rem; color: hsl(var(--foreground)); line-height: 1.75; font-weight: 300;">
                    Associations don't need more features.
                </p>
                <p class="font-display" style=" font-size: 1.875rem; margin-top: 0.5rem; background: linear-gradient(135deg, hsl(230, 85%, 55%) 0%, hsl(270, 70%, 55%) 100%); -webkit-background-clip: text; background-clip: text; color: transparent; ">
  They need systems that don't fight each other.
</p>

            </div>
        </div>
    </section>

    <!-- Three Pillars Section -->
    <section id="pillars-section"
        style="padding: 9rem 0; position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('{{ asset('assets/section-6-bg.png') }}')">
        <div class="container" style="position: relative;">
            <div class="scroll-animate" style="text-align: center; margin-bottom: 5rem;">
                <span class="badge badge-primary" style="margin-bottom: 1.5rem; background: #2b4bee1a;">
                    Foundation
                </span>
                <h2 class="font-display" style="font-size: clamp(1.875rem, 4vw, 3rem); color: hsl(var(--foreground));">
                    Three principles. One platform.
                </h2>
            </div>

            <div style="max-width: 96rem; margin: 0 auto;">
                <div class="grid-3" style="max-width: 93%; margin: 0 auto;">
                    @php
                        $pillars = [
                            [
                                'title' => 'Seamless',
                                'descriptor' => 'Continuity across the entire member journey.',
                                'copy' => "Membership should feel continuous — not transactional. From joining and renewal to events, learning, and ongoing engagement, every interaction flows naturally. Members don't experience systems. They experience continuity.",
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>',
                                'delay' => '0'
                            ],
                            [
                                'title' => 'Unified',
                                'descriptor' => 'One source of truth powering every experience.',
                                'copy' => 'A single backend connects your website, member portal, events, and learning. No syncing. No duplication. No conflicting data. Your public website reflects the same system that powers your operations — instantly and accurately.',
                                'icon' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>',
                                'delay' => '100'
                            ],
                            [
                                'title' => 'Adaptive',
                                'descriptor' => 'Designed to evolve without disruption.',
                                'copy' => 'Your organization will change. Your platform should change with you. Seamless supports modern websites today and whatever comes next — without forcing migrations, redesigns, or starting over.',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>',
                                'delay' => '200'
                            ]
                        ];
                    @endphp

                    @foreach($pillars as $pillar)
                        <div class="scroll-animate" style="transition-delay: {{ $pillar['delay'] }}ms;">
                            <div class="pillar-card">
                                <div class="pillar-card-content">
                                    <div class="pillar-gradient"></div>

                                    <div style="position: relative;">
                                        <div class="pillar-icon" style="background: #2b4bee1a">
                                            <svg class="lucide" fill="none" stroke="hsl(var(--primary))" viewBox="0 0 24 24">
                                                {!! $pillar['icon'] !!}
                                            </svg>
                                        </div>

                                        <h3 class="font-display"
                                            style="font-size: 1.875rem; color: hsl(var(--foreground)); margin-bottom: 0.75rem;">
                                            {{ $pillar['title'] }}
                                        </h3>

                                        <p style="color: hsl(var(--primary)); font-weight: 500; margin-bottom: 1rem;">
                                            {{ $pillar['descriptor'] }}
                                        </p>

                                        <p style="color: hsl(var(--foreground) / 0.7); line-height: 1.75;">
                                            {{ $pillar['copy'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Core Capabilities -->
    <section style="padding: 9rem 0; position: relative; overflow: hidden;">
        <div class="blob-primary"></div>
        <div class="blob-secondary"></div>

        <div class="container" style="position: relative;">
            <div class="scroll-animate" style="text-align: center; margin-bottom: 5rem;">
                <span class="badge badge-accent" style="margin-bottom: 1.5rem; background: #10b77f1a;">
                    Capabilities
                </span>
                <h2 class="font-display"
                    style="font-size: clamp(1.875rem, 4vw, 3rem); color: hsl(var(--foreground)); margin-bottom: 1rem;">
                    Everything membership needs
                </h2>
                <p style="color: hsl(var(--foreground) / 0.7); max-width: fit-content; margin: 0 auto; font-size: 1.125rem;">
                    Every capability supports the membership relationship — not the other way around.
                </p>
            </div>

            <div style="max-width: 80rem; margin: 0 auto;">
                <div class="grid-2" style="max-width: 85%; margin: 0 auto;">
                    @php
                        $capabilities = [
                            [
                                'title' => 'Membership Lifecycle',
                                'impact' => 'Support the complete member journey from a single, unified record.',
                                'points' => [
                                    'Flexible membership tiers and structures',
                                    'Automated renewals and lifecycle communications',
                                    'Profile management with role-based access'
                                ],
                                'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                                'delay' => '0'
                            ],
                            [
                                'title' => 'Events & Registrations',
                                'impact' => 'Events that recognize and reward membership.',
                                'points' => [
                                    'Member-aware pricing and early access',
                                    'Seamless registration tied to member records',
                                    'Attendance tracking that informs engagement'
                                ],
                                'icon' => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
                                'delay' => '75'
                            ],
                            [
                                'title' => 'Learning, CEUs & Credentials',
                                'impact' => 'Professional development connected to membership.',
                                'points' => [
                                    'Progress and completion tied to member profiles',
                                    'Certification and credential management',
                                    'CEU tracking with automated reporting'
                                ],
                                'icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
                                'delay' => '150'
                            ],
                            [
                                'title' => 'Website Integration',
                                'impact' => 'Design freedom with backend unity.',
                                'points' => [
                                    'Works with WordPress, Wix, Webflow, and more',
                                    'Member data powers every page without syncing',
                                    'Modern design, unified operations'
                                ],
                                'icon' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
                                'delay' => '225'
                            ]
                        ];
                    @endphp

                    @foreach($capabilities as $capability)
                        <div class="scroll-animate" style="transition-delay: {{ $capability['delay'] }}ms;">
                            <div class="capability-card">
                                <div style="display: flex; align-items: flex-start; gap: 1.25rem;">
                                    <div class="capability-icon">
                                        <svg class="lucide-lg" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="2">
                                            {!! $capability['icon'] !!}
                                        </svg>
                                    </div>

                                    <div style="flex: 1;">
                                        <h3 class="font-display"
                                            style="font-size: 1.25rem; color: hsl(var(--foreground)); margin-bottom: 0.5rem;">
                                            {{ $capability['title'] }}
                                        </h3>
                                        <p
                                            style="color: hsl(var(--foreground) / 0.7); font-size: 0.875rem; margin-bottom: 1rem;">
                                            {{ $capability['impact'] }}
                                        </p>

                                        <ul style="display: flex; flex-direction: column; gap: 0.625rem;">
                                            @foreach($capability['points'] as $point)
                                                <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                                    <span
                                                        style="width: 0.375rem; height: 0.375rem; border-radius: 50%; background-color: hsl(var(--accent)); margin-top: 0.5rem; flex-shrink: 0;"></span>
                                                    <span
                                                        style="color: hsl(var(--foreground) / 0.7); font-size: 0.875rem;">{{ $point }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Product Video Section -->
    <section id="video-section"
        style="padding: 9rem 0; position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('{{ asset('assets/section-6-bg.png') }}')">
        <div class="container" style="position: relative;">
            <div style="max-width: 80rem; margin: 0 auto;">
                <div class="scroll-animate" style="text-align: center; margin-bottom: 4rem;">
                    <span class="badge badge-primary" style="margin-bottom: 1.5rem; background: #2b4bee1a;">
                        See It In Action
                    </span>
                    <h2 class="font-display"
                        style="font-size: clamp(1.875rem, 4vw, 3rem); color: hsl(var(--foreground)); margin-bottom: 1rem;">
                        Membership, without friction.
                    </h2>
                    <p style="color: hsl(var(--foreground) / 0.7); max-width: 44rem; margin: 0 auto; font-size: 1.125rem;">
                        A unified system that removes barriers across the entire member lifecycle —
                        from backend to frontend.
                    </p>
                </div>

                <div class="scroll-animate-scale animate-delay-100">
                    <div class="video-wrapper" style="position: relative;">
                        <div class="video-glow"></div>

                        <div class="video-container">
                            <video autoplay muted loop playsinline style="width: 100%; display: block;">
                                <source src="{{ asset('videos/features-product.mp4') }}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing Section -->
    <section class="cta-section">
        <div class="cta-gradient"></div>
        <div class="cta-glow-1"></div>
        <div class="cta-glow-2"></div>

        <div class="container" style="position: relative; z-index: 10;">
            <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
                <h2 class="font-display" style="font-size: clamp(1.875rem, 4vw, 3rem); color: white; margin-bottom: 2rem;">
                    Built for organizations that care about members.
                </h2>

                <p style="color: rgba(255, 255, 255, 0.7); font-size: 1.25rem; line-height: 1.75; margin-bottom: 3rem;">
                    Long-term stability. Clarity over clutter. Technology that earns trust
                    by staying out of the way. Seamless is infrastructure for organizations
                    that think in decades, not quarters.
                </p>

                <div
                    style="display: flex; flex-direction: row; gap: 1rem; justify-content: center; align-items: center;">
                    <a href="{{ route('request-demo') }}" class="btn-white">
                        Request a Demo
                        <svg class="lucide" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="{{ route('integrations') }}" class="btn-secondary">
                        Explore Integrations
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Scroll animation observer
        document.addEventListener('DOMContentLoaded', function () {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe all scroll-animate elements
            document.querySelectorAll('.scroll-animate, .scroll-animate-scale').forEach(element => {
                observer.observe(element);
            });
        });
    </script>
@endpush
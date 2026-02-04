@php
    $slides = [
        ['word' => 'Seamless', 'pronunciation' => "[seem-lis] / 'sēm lis /", 'definition' => 'Smoothly continuous or uniform in quality; combined in an inconspicuous way.'],
        ['word' => 'Unified', 'pronunciation' => "[yoo-nuh-fahyd] / 'yü nə fīd /", 'definition' => 'Made or joined into a single entity; brought together as one cohesive whole.'],
        ['word' => 'Adaptive', 'pronunciation' => "[uh-dap-tiv] / ə 'dap tiv /", 'definition' => 'Able to adjust to new conditions; designed to respond to changing requirements.'],
    ];
    $id = 'hero-' . uniqid();
@endphp

<section id="{{ $id }}" class="hero-section">
    <!-- Video Background -->
    <video autoplay muted loop playsinline class="hero-video">
        <source src="{{ asset('videos/hero-bg.mov') }}" type="video/quicktime" />
    </video>

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Content -->
    <div class="hero-content">
        <div class="hero-text-slider">
            @foreach($slides as $i => $s)
                <div class="hero-slide {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}">
                    <div class="slide-inner">
                        <h1 class="hero-title">{{ $s['word'] }}</h1>
                        <p class="hero-pronunciation">{{ $s['pronunciation'] }}</p>
                        <h2 class="hero-definition">{{ $s['definition'] }}</h2>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="hero-divider"></div>

        <p class="hero-tagline">A modern, unified AMS Platform built for now and what's to come.</p>

        <a href="{{ route('request-demo') }}" class="btn-cta">Request a Demo</a>

        <!-- Slide indicators -->
        <div class="hero-indicators">
            @foreach($slides as $i => $s)
                <button data-slide-index="{{ $i }}" class="indicator {{ $i === 0 ? 'indicator-active' : '' }}"
                    aria-label="Go to slide {{ $i + 1 }}"></button>
            @endforeach
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
        <div class="scroll-indicator-outer">
            <div class="scroll-indicator-inner"></div>
        </div>
    </div>

    <style>
        .hero-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background-color: linear-gradient(135deg, #2b4beea1, #8c3cdd8a);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 8rem 1.5rem;
            max-width: 80rem;
            margin: 0 auto;
        }

        .hero-text-slider {
            display: grid;
            grid-template-areas: "stack";
            margin-bottom: 2rem;
        }

        .hero-slide {
            grid-area: stack;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(1rem);
            /* translate-y-4 equivalent */
            transition: all 0.5s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            position: relative;
            z-index: 10;
            transform: translateY(0);
        }

        .slide-inner {
            transition: all 0.5s ease-in-out;
            opacity: 1;
            transform: translateY(0);
        }

        #{{ $id }} .anim-out-up {
            opacity: 0;
            transform: translateY(-16px);
        }

        #{{ $id }} .anim-out-down {
            opacity: 0;
            transform: translateY(16px);
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            font-family: Aspira, Inter, sans-serif;
            color: hsl(var(--primary-foreground));
            margin-bottom: 1rem;
        }

        @media (min-width: 768px) {
            .hero-title {
                font-size: 4rem;
            }
        }

        @media (min-width: 1024px) {
            .hero-title {
                font-size: 5rem;
            }
        }

        .hero-pronunciation {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.125rem;
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        @media (min-width: 768px) {
            .hero-pronunciation {
                font-size: 1.25rem;
            }
        }

        .hero-definition {
            font-size: 1.5rem;
            font-family: Aspira, Inter, sans-serif;
            color: hsl(var(--primary-foreground));
            margin-bottom: 1.5rem;
            line-height: 1.25;
        }

        @media (min-width: 768px) {
            .hero-definition {
                font-size: 1.875rem;
            }
        }

        @media (min-width: 1024px) {
            .hero-definition {
                font-size: 2.25rem;
            }
        }

        .hero-divider {
            width: 6rem;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.4);
            margin: 0 auto 1.5rem;
        }

        .hero-tagline {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            max-width: 42rem;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 768px) {
            .hero-tagline {
                font-size: 1.125rem;
            }
        }



        .hero-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .indicator {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.4);
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .indicator:hover {
            background-color: rgba(255, 255, 255, 0.6);
        }

        .indicator-active,
        .indicator.bg-primary-foreground {
            background-color: hsl(var(--primary-foreground));
            width: 1.5rem;
        }

        .indicator.w-6 {
            width: 1.5rem;
        }

        .indicator.w-2 {
            width: 0.5rem;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            animation: float 3s ease-in-out infinite;
        }

        .scroll-indicator-outer {
            width: 1.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 0.5rem;
        }

        .scroll-indicator-inner {
            width: 0.375rem;
            height: 0.75rem;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 9999px;
            animation: bounce 1s infinite;
        }



        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(0.5rem);
            }
        }
    </style>

    <script>
        (function () {
            const root = document.getElementById('{{ $id }}');
            if (!root) return;

            const slides = Array.from(root.querySelectorAll('.hero-slide'));
            const indicators = Array.from(root.querySelectorAll('.indicator'));
            let current = 0;
            let isAnimating = false;
            const intervalMs = 5000;
            let interval = null;

            function show(index) {
                if (isAnimating || index === current) return;
                isAnimating = true;

                const outgoing = slides[current];
                const incoming = slides[index];

                // Step 1: Fade Out Current
                outgoing.classList.remove('active');

                // Update indicators immediately for responsiveness
                indicators.forEach((btn, i) => {
                    if (i === index) {
                        btn.classList.add('indicator-active', 'bg-primary-foreground', 'w-6');
                        btn.classList.remove('w-2');
                    } else {
                        btn.classList.remove('indicator-active', 'bg-primary-foreground', 'w-6');
                        btn.classList.add('w-2');
                    }
                });

                // Step 2: Fade In Next (matches React's 500ms delay/transition duration)
                setTimeout(() => {
                    incoming.classList.add('active');
                    current = index;

                    // Allow next interaction after fade-in completes
                    setTimeout(() => {
                        isAnimating = false;
                    }, 500);
                }, 500);
            }

            function goNext() { show((current + 1) % slides.length); }

            indicators.forEach(btn => {
                btn.onclick = () => {
                    const idx = parseInt(btn.getAttribute('data-slide-index'));
                    if (isNaN(idx)) return;
                    clearInterval(interval);
                    show(idx);
                    interval = setInterval(goNext, intervalMs);
                }
            });

            interval = setInterval(goNext, intervalMs);
        })();
    </script>
</section>
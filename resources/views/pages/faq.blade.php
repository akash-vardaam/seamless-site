@extends('layouts.app')

@section('title', 'FAQ - Seamless')

@push('styles')
    <style>
        /* Animations */


        /* Hero Section */
        .faq-hero-section {
            padding-top: 8rem;
            padding-bottom: 5rem;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }



        /* Accordion Styles */
        .accordion {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .accordion-item {
            background-color: #ffffff;
            backdrop-filter: blur(8px);
            border-radius: 1rem;
            border: 1px solid hsla(var(--border), 0.5);
            padding: 0 1.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .accordion-item:hover {
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);
        }

        .accordion-trigger {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 0;
            font-size: 1.125rem;
            font-weight: 700;
            color: hsl(var(--foreground));
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .accordion-icon {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .accordion-item.active {
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);
        }

        .accordion-item.active .accordion-icon {
            transform: rotate(180deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0;
        }

        .accordion-item.active .accordion-content {
            max-height: 500px;
            padding-bottom: 1.5rem;
        }

        .accordion-content-inner {
            color: hsl(var(--foreground) / 0.7);
            line-height: 23px;
            font-size: 14px;
        }

        /* Button */


        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding-top: 6rem;
                padding-bottom: 4rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="faq-hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
        <div class="container" style="position: relative; z-index: 10;">
            <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
                <h1 class="font-display"
                    style="font-size: clamp(2.25rem, 5vw, 4.5rem); color: white; margin-bottom: 1.5rem; line-height: 1.1;">
                    Understanding Seamless <span class="text-accent">starts here.</span>
                </h1>
                <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.5;  max-width:90%; margin: 20px auto;">
                    Clear answers to common questions about Seamless, our approach, and how we support modern associations.
                </p>
                <a href="{{ route('request-demo') }}" class="btn-cta">
                    Request a Demo
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section
        style="padding: 5rem 0; position: relative; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('{{ asset('assets/section-6-bg.png') }}')">
        <div style="position: absolute; inset: 0; background-color: rgba(255, 255, 255, 0.8);"></div>
        <div class="container" style="position: relative; z-index: 10;">
            <div style="max-width: 48rem; margin: 0 auto;">
                <div class="scroll-animate">
                    <div class="accordion">
                        @php
                            $faqs = [
                                [
                                    'question' => 'Who is Seamless built for?',
                                    'answer' => 'Seamless is built for associations, nonprofits, and member-driven organizations that have outgrown disconnected tools and rigid systems. It\'s designed for organizations that value long-term member relationships, operational clarity, and the freedom to evolve without disruption.'
                                ],
                                [
                                    'question' => 'How is Seamless different from other AMS platforms?',
                                    'answer' => 'Most AMS platforms force trade-offs: a powerful backend paired with a rigid website, or a flexible website layered on top of fragmented data. Seamless is built on a different assumption — membership, engagement, and design should work together quietly and continuously, not compete.'
                                ],
                                [
                                    'question' => 'Is Seamless membership-first or event-focused?',
                                    'answer' => 'Seamless is membership-first by design. Events, learning, certifications, and commerce are fully supported, but they\'re built on top of a unified member lifecycle. Members don\'t experience systems — they experience continuity.'
                                ],
                                [
                                    'question' => 'What does "Unified" actually mean?',
                                    'answer' => 'Unified means one system, one database, and one source of truth. Membership data, pricing, permissions, events, learning, and credentials are managed once and reflected everywhere — across your backend and your website — without syncing issues or duplication.'
                                ],
                                [
                                    'question' => 'Can Seamless work with our existing website?',
                                    'answer' => 'Yes. Seamless integrates cleanly with modern websites and can also power fully unified digital experiences. Your backend remains stable while your website evolves — no forced redesigns or replatforming required.'
                                ],
                                [
                                    'question' => 'Is Seamless customizable?',
                                    'answer' => 'Seamless is configurable without being brittle. You can adapt membership models, workflows, pricing, and engagement experiences without custom development that creates long-term technical debt.'
                                ],
                                [
                                    'question' => 'How does pricing work?',
                                    'answer' => 'Pricing is based on your organization\'s annual revenue, allowing costs to scale fairly as you grow. All subscriptions include the full platform — no feature gating or surprise add-ons.'
                                ],
                                [
                                    'question' => 'Why is onboarding required?',
                                    'answer' => 'Onboarding ensures Seamless is implemented correctly from day one. We help unify data, configure membership models, align workflows, and set your organization up for long-term success — not just launch day.'
                                ],
                                [
                                    'question' => 'How long does implementation take?',
                                    'answer' => 'Most organizations complete implementation within 8–12 weeks, depending on complexity, data migration needs, and organizational readiness.'
                                ],
                                [
                                    'question' => 'What kind of support do you offer?',
                                    'answer' => 'All customers receive U.S.-based support, individualized onboarding, and ongoing assistance from people who understand associations. Support is treated as a partnership, not a ticket queue.'
                                ],
                                [
                                    'question' => 'Is Seamless secure?',
                                    'answer' => 'Yes. Seamless follows modern security best practices to protect member data and organizational systems. Security, reliability, and data integrity are foundational to the platform.'
                                ],
                                [
                                    'question' => 'What happens as our organization evolves?',
                                    'answer' => 'Seamless is designed to adapt as your organization grows. New programs, revenue models, and digital experiences can be added without forced migrations, redesigns, or system replacements.'
                                ],
                                [
                                    'question' => 'What\'s the best next step?',
                                    'answer' => 'The best next step is a conversation. We\'ll talk through where your organization is today, where it\'s headed, and whether Seamless is the right fit.'
                                ]
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item" data-accordion-item>
                                <button class="accordion-trigger" type="button">
                                    <span>{{ $faq['question'] }}</span>
                                    <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="accordion-content">
                                    <div class="accordion-content-inner">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="padding: 7rem 0; background-color: hsla(var(--muted), 0.3);">
        <div class="container">
            <div class="scroll-animate" style="max-width: 46rem; margin: 0 auto; text-align: center;">
                <h2 class="font-display" style="font-size: 2.25rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                    Still have questions?
                </h2>
                <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7); margin-bottom: 2rem;">
                    We're here to help. Let's start a conversation about your organization's needs.
                </p>
                <a href="{{ route('contact') }}" class="btn-cta">
                    Contact Us
                </a>
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

            document.querySelectorAll('.scroll-animate').forEach(element => {
                observer.observe(element);
            });

            // Accordion functionality
            const accordionItems = document.querySelectorAll('[data-accordion-item]');

            accordionItems.forEach(item => {
                const trigger = item.querySelector('.accordion-trigger');

                trigger.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');

                    // Close all items
                    accordionItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                    });

                    // Open clicked item if it wasn't already open
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>
@endpush
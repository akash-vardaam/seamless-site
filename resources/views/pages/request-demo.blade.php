@extends('layouts.app')

@section('title', 'Request Demo - Seamless')

@push('styles')
<style>




    /* Animations */


    /* Hero Section */
    .demo-hero-section {
        padding-top: 8rem;
        padding-bottom: 5rem;
        position: relative;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }



    /* Form Styles */
    .form-card {
        background-color: hsl(var(--card));
        border-radius: 1.5rem;
        padding: 3rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid #F2F3F5;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: hsl(var(--foreground));
        margin-bottom: 0.5rem;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        height: 3rem;
        padding: 0.75rem 1rem;
        border: 1px solid #E5E7EB;
        border-radius: 0.75rem;
        font-size: 14px;
        line-height: 20px;
        background-color: hsl(var(--background));
        color: hsl(var(--foreground));
        transition: all 0.2s ease;
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: hsl(var(--primary));
        box-shadow: 0 0 0 3px hsla(var(--primary), 0.1);
    }

    .form-textarea {
        height: auto;
        min-height: 120px;
        resize: none;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: hsl(var(--foreground) / 0.4);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    /* Button */
        .form-card .btn-cta {
    width: 100%;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem; /* static spacing */
    }

    .form-card .btn-cta .arrow-icon {
    transition: transform 200ms ease;
    }

    .form-card .btn-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 40px hsl(160 84% 39% / 0.3);
    }

    .form-card .btn-cta:hover .arrow-icon {
    transform: translateX(7px);
    }


    /* Success Message */
    .success-message {
        text-align: center;
        padding: 4rem 2rem;
    }

    .success-icon {
        width: 4rem;
        height: 4rem;
        color: hsl(var(--accent));
        margin: 0 auto 1.5rem;
    }

    /* Hidden class */
    .hidden {
        display: none !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding-top: 6rem;
            padding-bottom: 4rem;
        }

        .form-card {
            padding: 2rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    .lucide-lg {
        width: 1.5rem;
        height: 2rem;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="demo-hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
    <div class="container" style="position: relative; z-index: 10;">
        <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
            <h1 class="font-display" style="font-size: clamp(2.25rem, 5vw, 4.5rem); color: white; margin-bottom: 1.5rem; line-height: 1.1;">
                See Seamless <span class="text-accent">in action.</span>
            </h1>
            <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.75;">
                Schedule a personalized demo and discover how Seamless can transform your member experience.
            </p>
        </div>
    </div>
</section>

<!-- Form Section -->
<section style="padding: 7rem 0;">
    <div class="container">
        <div style="max-width: 42rem; margin: 0 auto;">
            <!-- Success Message (hidden by default) -->
            <div id="successMessage" class="scroll-animate hidden">
                <div class="success-message">
                    <svg class="success-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h2 class="font-display" style="font-size: 2.25rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                        Thank you for your interest!
                    </h2>
                    <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7);">
                        We've received your request and will be in touch within one business day to schedule your demo.
                    </p>
                </div>
            </div>

            <!-- Demo Form (visible by default) -->
            <div id="demoForm" class="scroll-animate">
                <div class="form-card">
                    <h2 class="font-display" style="font-size: 1.875rem; color: hsl(var(--foreground)); margin-bottom: 0.5rem;">
                        Request your demo
                    </h2>
                    <p style="color: hsl(var(--foreground) / 0.7); margin-bottom: 2rem;">
                        Fill out the form below and we'll reach out to schedule a time that works for you.
                    </p>
                    
                    <form action="{{ route('demo.submit') }}" method="POST" id="mainDemoForm">
                        @csrf
                        
                        <div class="form-grid" style="margin-bottom: 1.5rem;">
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input 
                                    type="text" 
                                    id="firstName" 
                                    name="first_name"
                                    class="form-input" 
                                    required 
                                    placeholder="John"
                                    value="{{ old('first_name') }}"
                                />
                                @error('first_name')
                                    <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input 
                                    type="text" 
                                    id="lastName" 
                                    name="last_name"
                                    class="form-input" 
                                    required 
                                    placeholder="Smith"
                                    value="{{ old('last_name') }}"
                                />
                                @error('last_name')
                                    <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Work Email *</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                class="form-input" 
                                required 
                                placeholder="john@organization.org"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="organization" class="form-label">Organization Name *</label>
                            <input 
                                type="text" 
                                id="organization" 
                                name="organization"
                                class="form-input" 
                                required 
                                placeholder="Your Association"
                                value="{{ old('organization') }}"
                            />
                            @error('organization')
                                <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="title" class="form-label">Job Title</label>
                            <input 
                                type="text" 
                                id="title" 
                                name="job_title"
                                class="form-input" 
                                placeholder="Executive Director"
                                value="{{ old('job_title') }}"
                            />
                            @error('job_title')
                                <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">What would you like to see in the demo?</label>
                            <textarea 
                                id="message" 
                                name="message"
                                class="form-textarea" 
                                placeholder="Tell us about your current challenges or specific features you'd like to explore..."
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn-cta">
                            Request Demo
                            <svg class="lucide-lg arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Scroll animation observer
    document.addEventListener('DOMContentLoaded', function() {
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

        // Check if there's a success message in session
        @if(session('success'))
            document.getElementById('demoForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
        @endif
    });
</script>
@endpush

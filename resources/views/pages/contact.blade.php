@extends('layouts.app')

@section('title', 'Contact - Seamless')

@push('styles')
<style>




    /* Animations */


    /* Hero Section */
    .contact-hero-section {
        padding-top: 8rem;
        padding-bottom: 5rem;
        position: relative;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero-title {
        font-size: clamp(2.25rem, 5vw, 4.5rem);
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }



    /* Contact Info Cards */
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .contact-icon-wrapper {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        background-color: hsl(var(--accent) / 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* Form Styles */
    .form-card {
        background-color: hsl(var(--card));
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid hsl(var(--border) / 0.5);
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
        border: 1px solid hsl(var(--border));
        border-radius: 0.75rem;
        font-size: 1rem;
        background-color: hsl(var(--background));
        color: hsl(var(--foreground));
        transition: all 0.2s ease;
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: hsl(var(--primary));
        box-shadow: 0 0 0 3px hsl(var(--primary) / 0.1);
    }

    .form-textarea {
        height: auto;
        min-height: 150px;
        resize: none;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: hsl(var(--foreground) / 0.4);
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
            .success-card {
                text-align: center;
                padding: 4rem 2rem;
                background-color: hsl(var(--card));
                border-radius: 1.5rem;
                border: 1px solid hsl(var(--border) / 0.5);
            }

            .success-icon {
                width: 4rem;
                height: 4rem;
                color: hsl(var(--accent));
                margin: 0 auto 1.5rem;
            }

    /* Grid Layout */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        max-width: 72rem;
        margin: 0 auto;
    }

    @media (min-width: 1024px) {
        .contact-grid {
            grid-template-columns: 2fr 3fr;
        }
    }

    @media (min-width: 768px) {
        .hero-section {
            padding-top: 10rem;
            padding-bottom: 7rem;
        }

        .form-card {
            padding: 2.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
    }

    /* Icon styles */
    .lucide {
        width: 1.25rem;
        height: 1.25rem;
        stroke-width: 2;
    }

    .lucide-lg {
        width: 1.5rem;
        height: 2rem;
    }

    /* Hidden class for JS toggle */
    .hidden {
        display: none !important;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="contact-hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
    <div class="container" style="position: relative; z-index: 10;">
        <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
            <h1 class="hero-title font-display" style="color: white;">
                Let's start a <span class="text-accent">conversation.</span>
            </h1>
            <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.75;">
                Have questions about Seamless? We're here to help you find the right solution for your organization.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section style="padding: 7rem 0;">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div>
                <div class="scroll-animate">
                    <h2 class="font-display" style="font-size: 1.875rem; color: hsl(var(--foreground)); margin-bottom: 1.5rem;">
                        Get in touch
                    </h2>
                    <p style="color: hsl(var(--foreground) / 0.7); margin-bottom: 2rem;">
                        Whether you're exploring Seamless for the first time or have specific questions about implementation, our team is ready to help.
                    </p>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div class="contact-info-item">
                            <div class="contact-icon-wrapper">
                                <svg class="lucide" fill="none" stroke="hsl(var(--accent))" viewBox="0 0 24 24">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 600; color: hsl(var(--foreground)); margin-bottom: 0.25rem;">Email</h3>
                                <p style="color: hsl(var(--foreground) / 0.7);">hello@seamless.org</p>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-icon-wrapper">
                                <svg class="lucide" fill="none" stroke="hsl(var(--accent))" viewBox="0 0 24 24">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 600; color: hsl(var(--foreground)); margin-bottom: 0.25rem;">Phone</h3>
                                <p style="color: hsl(var(--foreground) / 0.7);">(555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-icon-wrapper">
                                <svg class="lucide" fill="none" stroke="hsl(var(--accent))" viewBox="0 0 24 24">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 600; color: hsl(var(--foreground)); margin-bottom: 0.25rem;">Location</h3>
                                <p style="color: hsl(var(--foreground) / 0.7);">United States</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form or Success Message -->
            <div>
                <!-- Success Message (hidden by default) -->
                <div id="successMessage" class="scroll-animate animate-delay-100 hidden">
                    <div class="success-card">
                        <svg class="success-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h2 class="font-display" style="font-size: 2.25rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                            Message sent!
                        </h2>
                        <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7);">
                            Thank you for reaching out. We'll respond within one business day.
                        </p>
                    </div>
                </div>

                <!-- Contact Form (visible by default) -->
                <div id="contactForm" class="scroll-animate animate-delay-100">
                    <div class="form-card">
                        <form action="{{ route('contact.submit') }}" method="POST" id="mainContactForm">
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
                                <label for="email" class="form-label">Email *</label>
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
                                <label for="organization" class="form-label">Organization</label>
                                <input 
                                    type="text" 
                                    id="organization" 
                                    name="organization"
                                    class="form-input" 
                                    placeholder="Your Association"
                                    value="{{ old('organization') }}"
                                />
                                @error('organization')
                                    <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="subject" class="form-label">Subject *</label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    name="subject"
                                    class="form-input" 
                                    required
                                    placeholder="How can we help?"
                                    value="{{ old('subject') }}"
                                />
                                @error('subject')
                                    <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="message" class="form-label">Message *</label>
                                <textarea 
                                    id="message" 
                                    name="message"
                                    class="form-textarea" 
                                    required
                                    placeholder="Tell us more about your needs..."
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <span style="color: hsl(var(--accent)); font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-cta" style="width: 100%">
                                Send Message
                                <svg class="lucide-lg arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </form>
                    </div>
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

        // Observe all elements with scroll-animate class
        document.querySelectorAll('.scroll-animate').forEach(element => {
            observer.observe(element);
        });

        // Form submission handling
        const form = document.getElementById('mainContactForm');
        const contactFormDiv = document.getElementById('contactForm');
        const successMessageDiv = document.getElementById('successMessage');

        // Check if there's a success message in session (for server-side submission)
        @if(session('success'))
            contactFormDiv.classList.add('hidden');
            successMessageDiv.classList.remove('hidden');
        @endif

        // Optional: Handle form via AJAX
        form.addEventListener('submit', function(e) {
            // Uncomment below to enable AJAX submission
            /*
            e.preventDefault();
            
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    contactFormDiv.classList.add('hidden');
                    successMessageDiv.classList.remove('hidden');
                    
                    // Scroll to success message
                    successMessageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting the form. Please try again.');
            });
            */
        });
    });
</script>
@endpush

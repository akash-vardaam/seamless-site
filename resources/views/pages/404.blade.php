@extends('layouts.app')

@section('title', '404 - Page Not Found')

@push('styles')
<style>
    :root {
        --primary: 220 90% 56%;
        --muted: 210 40% 96.1%;
        --foreground: 222.2 84% 4.9%;
    }

    .error-container {
        display: flex;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
        background-color: hsl(var(--muted));
    }

    .error-content {
        text-align: center;
        padding: 2rem;
    }

    .error-title {
        margin-bottom: 1rem;
        font-size: 4rem;
        font-weight: 700;
        color: hsl(var(--foreground));
        font-family: Aspira,Inter,sans-serif;
    }

    .error-message {
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: hsl(var(--foreground) / 0.7);
    }

    .error-link {
        display: inline-block;
        color: hsl(var(--primary));
        text-decoration: underline;
        font-size: 1.125rem;
        transition: opacity 0.2s ease;
    }

    .error-link:hover {
        opacity: 0.8;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .error-content {
        animation: fadeIn 0.6s ease-out;
    }
</style>
@endpush

@section('content')
<div class="error-container">
    <div class="error-content">
        <h1 class="error-title">404</h1>
        <p class="error-message">Oops! Page not found</p>
        <a href="{{ route('home') }}" class="error-link">
            Return to Home
        </a>
    </div>
</div>
@endsection

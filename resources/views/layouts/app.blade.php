<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seamless - Modern AMS Platform')</title>
    <meta name="description" content="@yield('description', 'A modern, unified AMS Platform built for now and what\'s to come.')">
    
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georgia:wght@400;700&family=Segoe+UI:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary: 220 90% 56%;
            --secondary: 280 70% 60%;
            --accent: 340 80% 58%;
            --background: 0 0% 100%;
            --foreground: 222.2 84% 4.9%;
            --card: 0 0% 100%;
            --muted: 210 40% 96.1%;
            --border: 214.3 31.8% 91.4%;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: hsl(var(--background));
            color: hsl(var(--foreground));
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Global button styles */
        .btn-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
            color: white;
            border-radius: 9999px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 9999px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            background: transparent;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main class="pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Toast Notifications -->
    <x-ui.toast />

    <!-- Vite JS -->
    @vite('resources/js/app.js')

    @stack('scripts')
</body>
</html>

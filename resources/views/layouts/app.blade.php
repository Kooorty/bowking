<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Haunted Woods') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|creepster:400&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            .bg-primary {
                background-color: #111827;
            }
            .text-primary {
                color: #ea580c;
            }
            .text-secondary {
                color: #7e22ce;
            }
            .border-primary {
                border-color: #ea580c;
            }
            .btn-primary {
                background-color: #ea580c;
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                background-color: #c2410c;
                transform: translateY(-2px);
                box-shadow: 0 10px 20px -10px rgba(234, 88, 12, 0.6);
            }
            .btn-secondary {
                background-color: #7e22ce;
                transition: all 0.3s ease;
            }
            .btn-secondary:hover {
                background-color: #6b21a8;
                transform: translateY(-2px);
            }
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            .floating {
                animation: float 3s ease-in-out infinite;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-900 text-gray-100">
        <div class="min-h-screen bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-800 shadow-lg border-b border-orange-500">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="bg-gray-900">
                {{ $slot }}
            </main>
        </div>

        <!-- Animation script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const animateElements = document.querySelectorAll('.animate-fade-in-down, .animate-fade-in-up');
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('opacity-100', 'translate-y-0');
                            entry.target.classList.remove('opacity-0');
                        }
                    });
                }, { threshold: 0.1 });

                animateElements.forEach(el => {
                    observer.observe(el);
                    if (el.classList.contains('animate-fade-in-down')) {
                        el.classList.add('opacity-0', '-translate-y-4');
                    } else if (el.classList.contains('animate-fade-in-up')) {
                        el.classList.add('opacity-0', 'translate-y-4');
                    }
                    el.classList.add('transition-all', 'duration-500', 'ease-out');
                });
            });
        </script>
    </body>
</html>
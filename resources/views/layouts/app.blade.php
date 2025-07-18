<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Spectral Sanctuary') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|creepster:400&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        eerie: {
                            black: '#0b0f1a',
                            blue: '#0a0e23',
                            teal: '#00E0C6',
                            purple: '#9A4EFF',
                            pink: '#FF99CC',
                        },
                        galaxy: {
                            star: '#e1e1ff',
                            mist: '#fdf6ff',
                            dark: '#0b0f1a',
                        }
                    },
                    fontFamily: {
                        creepster: ['Creepster', 'cursive'],
                        sans: ['Figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background: linear-gradient(160deg, #0a0e23 0%, #1c1435 100%);
            color: #e1e1ff;
            font-family: 'Figtree', sans-serif;
        }

        .glow-text {
            text-shadow: 0 0 6px #7D4AEA, 0 0 12px #00E0C6;
        }

        .glow-box {
            box-shadow: 0 0 20px rgba(125, 74, 234, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #9A4EFF 0%, #00E0C6 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(154, 78, 255, 0.6);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        .animate-fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        
    </style>
</head>
<body class="antialiased bg-galaxy-dark text-galaxy-star">
    <div class="min-h-screen bg-eerie-black bg-opacity-90">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="bg-eerie-black bg-opacity-95 scroll-animate">
            {{ $slot }}
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const animateOnScroll = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.scroll-animate').forEach(el => {
                animateOnScroll.observe(el);
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haunted Woods Booking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600|creepster:400&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1506634572416-48cdfe530110?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
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
            color: white;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #6b21a8;
            transform: translateY(-2px);
        }
        .feature-card {
            transition: all 0.3s ease;
            background-color: #1f2937;
            border: 1px solid #ea580c;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(234, 88, 12, 0.3);
        }
        .bat-icon {
            color: #ea580c;
        }
        .testimonial-bg {
            background-color: #111827;
        }
        .footer-bg {
            background-color: #1c1917;
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
<body class="antialiased font-['Figtree'] bg-gray-900">
    <!-- Hero Section -->
    <div class="hero-gradient text-white min-h-screen flex items-center">
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-5xl font-bold mb-6 animate-fade-in-down font-['Creepster']">Haunted Woods Retreat</h1>
                <p class="text-xl mb-10 opacity-90 animate-fade-in-down delay-100">
                    Experience the thrill of our haunted woodland retreats. 
                    Book your spooky escape among the shadows and encounter the supernatural.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-200">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" 
                               class="btn-primary px-8 py-3 rounded-lg font-semibold text-lg shadow-lg">
                                Enter the Haunt
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="btn-primary px-8 py-3 rounded-lg font-semibold text-lg shadow-lg">
                                Witch's Entrance
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="btn-secondary px-8 py-3 rounded-lg font-semibold text-lg">
                                    Brew Potion
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-orange-500 mb-12 font-['Creepster']">Experience the Supernatural</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card p-8 rounded-xl floating">
                    <div class="bat-icon mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-orange-400">Haunted Cabins</h3>
                    <p class="text-gray-300">
                        Stay in our ghostly cabins nestled in ancient woods, filled with paranormal activity.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card p-8 rounded-xl floating" style="animation-delay: 0.2s">
                    <div class="bat-icon mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-orange-400">Ghost Trails</h3>
                    <p class="text-gray-300">
                        Explore haunted trails through eerie forests where spirits roam freely.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card p-8 rounded-xl floating" style="animation-delay: 0.4s">
                    <div class="bat-icon mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-orange-400">Séances</h3>
                    <p class="text-gray-300">
                        Connect with spirits from beyond the grave in our guided supernatural sessions.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-16 testimonial-bg">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-orange-500 mb-12 font-['Creepster']">Voices from Beyond</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Testimonial 1 -->
                <div class="bg-gray-800 p-6 rounded-xl shadow-sm border border-orange-500">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-orange-900 flex items-center justify-center text-orange-500 font-bold mr-4">
                            JD
                        </div>
                        <div>
                            <h4 class="font-semibold text-orange-400">Jack O'Lantern</h4>
                            <p class="text-gray-500 text-sm">Ghost Hunter</p>
                        </div>
                    </div>
                    <p class="text-gray-300">
                        "The haunted retreat gave me chills! Waking up to ghostly whispers was terrifyingly amazing!"
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-800 p-6 rounded-xl shadow-sm border border-purple-500">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-purple-900 flex items-center justify-center text-purple-500 font-bold mr-4">
                            AS
                        </div>
                        <div>
                            <h4 class="font-semibold text-purple-400">Annabelle Specter</h4>
                            <p class="text-gray-500 text-sm">Paranormal Investigator</p>
                        </div>
                    </div>
                    <p class="text-gray-300">
                        "The séance sessions connected us with real spirits! The energy was chillingly authentic."
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-bg text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} Haunted Woods Retreat. All rights reserved.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-orange-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-purple-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>

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
<nav x-data="{ open: false }" class="bg-[#12102A] border-b border-white-700 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Side -->
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <svg class="h-10 w-auto fill-current text-pink-400 hover:text-purple-300 transition" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        
                    </svg>
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="text-purple-300 hover:text-pink-400 transition font-semibold tracking-wide">Dashboard</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex items-center space-x-6">
                @auth
                <!-- Notifications -->
                @php $unreadCount = auth()->user()->unreadNotifications()->count(); @endphp
                <a href="{{ route('notifications.index') }}" class="relative text-indigo-300 hover:text-pink-500 transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if($unreadCount > 0)
                    <span class="absolute top-0 right-0 w-5 h-5 bg-pink-600 text-white text-xs rounded-full flex items-center justify-center animate-pulse">
                        {{ $unreadCount }}
                    </span>
                    @endif
                </a>
                @endauth

                <!-- Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-indigo-300 hover:text-pink-400 transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4 text-pink-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-indigo-200 hover:bg-purple-800 hover:text-pink-400">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-indigo-200 hover:bg-purple-800 hover:text-pink-400">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-indigo-300 hover:text-pink-400 hover:bg-purple-800 focus:outline-none transition">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden bg-[#1A1833] border-t border-purple-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-purple-300 hover:text-pink-400">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Mobile Profile -->
        <div class="pt-4 pb-1 border-t border-purple-700 px-4 text-indigo-300">
            <div class="font-medium">{{ Auth::user()->name }}</div>
            <div class="text-sm text-indigo-400">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')" class="text-indigo-200 hover:bg-purple-800 hover:text-pink-400">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="w-full text-left px-4 py-2 text-indigo-200 hover:bg-purple-800 hover:text-pink-400">
        {{ __('Log Out') }}
    </button>
</form>
        </div>
    </div>
</nav>

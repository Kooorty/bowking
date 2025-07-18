<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="mr-4">
                    <svg class="block h-10 w-auto fill-current text-rose-400 animate-pulse" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </a>
                <h2 class="font-[Cinzel_Decorative] text-4xl text-pink-300 leading-tight tracking-widest glow-text">
                    👼 Celestial Chamber Dashboard
                </h2>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('notifications.index') }}" class="p-2 rounded-full text-pink-300 hover:text-black-300 relative">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if($unreadCount > 0)
                    <span class="absolute top-0 right-0 inline-block w-5 h-5 transform translate-x-1/2 -translate-y-1/2 bg-rose-500 rounded-full text-xs text-white flex items-center justify-center animate-bounce">
                        {{ $unreadCount }}
                    </span>
                    @endif
                </a>

                <a href="{{ route('bookings.create') }}" class="bg-gradient-to-r from-pink-500 via-pink-400 to-yellow-300 hover:from-pink-600 hover:to-yellow-400 text-white font-semibold py-2 px-6 rounded-full shadow-lg transition transform hover:scale-105 duration-150 ease-in-out">
                     Book Blessing
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 angelic-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-opacity-20 bg-emerald-800 border-l-4 border-emerald-300 p-6 mb-8 rounded">
                    <div class="flex items-center text-emerald-100 text-lg">
                        ✨ {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="bg-white/10 backdrop-blur-md shadow-2xl sm:rounded-2xl border border-pink-300 p-8">
                @if($bookings->isEmpty())
                    <div class="py-16 text-center text-rose-200">
                        <h3 class="text-4xl font-[Cinzel_Decorative] tracking-widest text-yellow-300">🕊️ No Blessing Reserved</h3>
                        <p class="text-lg text-pink-100 mt-2">Schedule your angelic encounter</p>
                        <a href="{{ route('bookings.create') }}"
                           class="mt-8 inline-flex items-center px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white text-lg font-semibold rounded-full shadow-lg">
                             Book now
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-lg text-pink-100 divide-y divide-rose-400 font-[Cinzel_Decorative]">
                            <thead class="bg-white/10">
                                <tr>
                                    <th class="px-6 py-5 text-left uppercase text-red-300">Angel</th>
                                    <th class="px-6 py-5 text-left uppercase text-red-300">Miracle</th>
                                    <th class="px-6 py-5 text-left uppercase text-red-300">Blessing Time</th>
                                    <th class="px-6 py-5 text-left uppercase text-red-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/5 divide-y divide-rose-300">
                                @foreach($bookings as $booking)
                                <tr class="hover:bg-pink-100/10 transition duration-150">
                                <td class="px-6 py-6 font-semibold text-purple-900">{{ $booking->name }}</td>
                                <td class="px-6 py-6 text-purple-800">{{ $booking->description }}</td>
                                <td class="px-6 py-6 text-purple-800">{{ $booking->created_at->format('M d, Y \a\t h:i A') }}</td>

                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }} 
                                        @ {{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}
                                    </td>
                                    <td class="px-6 py-6 space-x-4">
                                        <a href="{{ route('bookings.edit', $booking->id) }}"
                                           class="text-indigo-300 hover:text-indigo-200">✏️ Edit</a>
                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to remove this blessing?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-pink-300 hover:text-pink-200">🗑️ Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&display=swap');

        body {
            background-color: #f3e8ff;
            background-image: linear-gradient(145deg, #fdeff9 0%, #e1bee7 100%);
            color: #fff;
            font-family: 'Cinzel Decorative', cursive;
        }

        .angelic-bg {
            background: linear-gradient(to bottom, #f8bbd0 0%, #f3e5f5 100%);
        }

        .glow-text {
            text-shadow: 0 0 8px #fff6, 0 0 16px #ff9ee6, 0 0 32px #fbc2eb;
        }
    </style>
</x-app-layout>

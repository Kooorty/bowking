<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-pink-400 leading-tight font-['Great_Vibes']">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-100 to-blue-200 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-2xl border border-pink-200">
                <div class="p-8">
                    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="name" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Haunt Name</label>
                            <input type="text" name="name" id="name" value="{{ $booking->name }}" required 
                                   class="shadow border border-pink-300 rounded-xl w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-pink-300 focus:border-pink-300">
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Ghostly Description</label>
                            <textarea name="description" id="description" rows="3" required
                                      class="shadow border border-pink-300 rounded-xl w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-pink-300 focus:border-pink-300">{{ $booking->description }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="booking_date" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Full Moon Date</label>
                                <input type="date" name="booking_date" id="booking_date" value="{{ $booking->booking_date }}" required
                                       class="shadow border border-pink-300 rounded-xl w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-pink-300 focus:border-pink-300">
                            </div>
                            <div class="mb-6">
                                <label for="booking_time" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Witching Hour</label>
                                <input type="time" name="booking_time" id="booking_time" value="{{ $booking->booking_time }}" required
                                       class="shadow border border-pink-300 rounded-xl w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-pink-300 focus:border-pink-300">
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded-xl shadow">
                                Cancel
                            </a>
                            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-xl shadow">
                                Update 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-400 leading-tight font-['Creepster']">
            {{ __('Modify Haunt') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-orange-500">
                <div class="p-6 bg-gray-800">
                    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-orange-400 text-sm font-bold mb-2">Haunt Name</label>
                            <input type="text" name="name" id="name" value="{{ $booking->name }}" required 
                                   class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-orange-400 text-sm font-bold mb-2">Ghostly Description</label>
                            <textarea name="description" id="description" rows="3" required
                                      class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ $booking->description }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="booking_date" class="block text-orange-400 text-sm font-bold mb-2">Full Moon Date</label>
                                <input type="date" name="booking_date" id="booking_date" value="{{ $booking->booking_date }}" required
                                       class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div class="mb-4">
                                <label for="booking_time" class="block text-orange-400 text-sm font-bold mb-2">Witching Hour</label>
                                <input type="time" name="booking_time" id="booking_time" value="{{ $booking->booking_time }}" required
                                       class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            </div>
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <button type="submit" class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded">
                                Update Haunt
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
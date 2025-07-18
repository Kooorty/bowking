<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-500 leading-tight font-['Great_Vibes','cursive']">
            {{ __('Brew New Haunt') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-pink-50 to-purple-100">
        <div class="max-w-4xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white bg-opacity-70 overflow-hidden shadow-2xl rounded-2xl border border-pink-200">
                <div class="p-10">
                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Name</label>
                            <input type="text" name="name" id="name" required class="shadow-md border border-pink-300 rounded-lg w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-300">
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Description</label>
                            <textarea name="description" id="description" rows="4" required class="shadow-md border border-pink-300 rounded-lg w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-300"></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="booking_date" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Date</label>
                                <input type="date" name="booking_date" id="booking_date" required class="shadow-md border border-pink-300 rounded-lg w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-300">
                            </div>
                            <div class="mb-6">
                                <label for="booking_time" class="block text-pink-600 text-lg font-semibold mb-2 font-serif">Hour</label>
                                <input type="time" name="booking_time" id="booking_time" required class="shadow-md border border-pink-300 rounded-lg w-full py-3 px-4 bg-white text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-300">
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('dashboard') }}" class="bg-purple-200 hover:bg-purple-300 text-purple-700 font-bold py-2 px-6 rounded-lg transition-all ease-in-out duration-300">
                                Cancel
                            </a>
                            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-lg transition-all ease-in-out duration-300">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

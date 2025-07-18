<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-400 leading-tight font-['Creepster']">
            {{ __('Edit Your Spellbook') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-orange-500">
                <div class="p-6 bg-gray-800">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-orange-400 text-sm font-bold mb-2">Witch/Warlock Name</label>
                            <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-orange-400 text-sm font-bold mb-2">Coven Email</label>
                            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-orange-400 text-sm font-bold mb-2">New Magic Spell (leave blank to keep current)</label>
                            <input type="password" name="password" id="password" class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-orange-400 text-sm font-bold mb-2">Confirm Magic Spell</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 bg-gray-700 text-gray-300 leading-tight focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded">
                                Update Spellbook
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-400 leading-tight font-['Creepster']">
            {{ __('Ghostly Messages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-orange-500">
                <div class="p-6 bg-gray-800">
                    @if($notifications->isEmpty())
                        <p class="text-gray-300">No ghostly messages found.</p>
                    @else
                        <ul class="divide-y divide-gray-700">
                            @foreach($notifications as $notification)
                            <li class="py-4">
                                <div class="flex justify-between">
                                    <p class="text-gray-300 {{ $notification->read_at ? '' : 'font-bold text-orange-400' }}">
                                        👻 {{ $notification->message }}
                                    </p>
                                    <div class="flex space-x-2">
                                        <span class="text-sm text-gray-500">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </span>
                                        @if(!$notification->read_at)
                                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-purple-400 hover:text-purple-300 text-sm">
                                                Banish
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
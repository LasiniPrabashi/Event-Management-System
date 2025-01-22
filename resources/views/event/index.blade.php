<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 py-2 rounded">
                Event Section
            </a>
            <a href="{{ route('event.create') }}">
                <button type="button"
                        class="dark:bg-black text-white px-4 py-2 rounded-md bg-indigo-600 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add new Event
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-black overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #F3E5F5;">
                <div class="py-8"> <!-- Reduced extra padding -->
                    <!-- Wrap all cards in the grid container -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-6"> <!-- Adjusted gap and padding -->
                        @foreach ($events as $event) <!-- Updated variable name -->
                            <a href="/events/{{ $event->id }}" class="block p-6 border border-gray-200 rounded-lg bg-white">
                                <div>
                                    <strong>{{ $event->event_name }}:</strong>
                                    Located at {{ $event->location }} on {{ $event->start_date }}.
                                </div>

                                <div>
                                    <strong>Description:</strong> {{ $event->description }}
                                </div>

                                <div>
                                    <strong>Start Time:</strong> {{ $event->start_time }}
                                </div>

                                <div>
                                    <strong>End Date:</strong> {{ $event->end_date }}
                                </div>

                                <div>
                                    <strong>Event Status:</strong>
                                    {{ $event->is_active ? 'Active' : 'Inactive' }}
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Pagination links -->
                    <div class="mt-6 px-6"> <!-- Added more margin for better spacing -->
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

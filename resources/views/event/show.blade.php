<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 py-2 rounded">
                Event
            </a>

            <form>
            <a href="{{ route('event.edit', $event->id) }}">
                <button type="button"

                        class="dark:bg-black text-black px-6 py-3 rounded-md bg-indigo-600 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Change/Add Event

                </button>
            </a>
            <a href="{{ route('invitations.create', ['event_id' => $event->id]) }}">
                <button type="button"
                        class="dark:bg-black px-6 py-3 rounded-md bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Send Invitations
                </button>
            </a>
            <a href="{{ route('invitations.rsvp', ['eventId' => $event->id]) }}">
                <button type="button"
                        class="dark:bg-black px-6 py-3 rounded-md bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Show RSVP
                </button>
            </a>

            </form>
        </div>
    </x-slot>

    <!-- Single wrapper div with more padding and space -->
    <div class="overflow-y-auto h-96 w-full p-6 mt-10 ">

        <!-- Event Details and Status with increased grid gap and margin -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Event Name:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->event_name }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Location:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->location }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Start Date:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">End Date:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Start Time:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</p>
            </div>

            <!-- Event Status with margin-top -->
            <div class="mt-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Event Status:</h2>
                <span class="inline-block px-4 py-2 mt-2 text-sm font-medium {{ $event->is_active ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }} rounded-full">
                    {{ $event->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <!-- Description with margin-bottom -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Description:</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
        </div>


    </div>



</x-app-layout>

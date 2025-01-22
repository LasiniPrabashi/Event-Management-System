<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RSVP Lists
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex overflow-hidden w-full shadow-xl sm:rounded-lg p-6 gap-3">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 underline">Pending Invitations</h3>
                @if ($pendingInvitations->isEmpty())
                    <p>No pending invitations.</p>
                @else
                    <ul>
                        @foreach ($pendingInvitations as $invitation)
                            <li>
                                <strong>Event:</strong> {{ $invitation->event->event_name }} - 
                                <strong>User:</strong> {{ $invitation->user->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mt-6 mb-4 underline">Accepted Invitations</h3>
                @if ($acceptedInvitations->isEmpty())
                    <p>No accepted invitations.</p>
                @else
                    <ul>
                        @foreach ($acceptedInvitations as $invitation)
                            <li>
                                <strong>Event:</strong> {{ $invitation->event->event_name }} - 
                                <strong>User:</strong> {{ $invitation->user->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mt-6 mb-4 underline">Declined Invitations</h3>
                @if ($declinedInvitations->isEmpty())
                    <p>No declined invitations.</p>
                @else
                    <ul>
                        @foreach ($declinedInvitations as $invitation)
                            <li>
                                <strong>Event:</strong> {{ $invitation->event->event_name }} - 
                                <strong>User:</strong> {{ $invitation->user->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            </div>
        </div>
    </div>
</x-app-layout>

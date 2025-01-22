<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 font-semibold text-2xl py-2 rounded">RSVP Status Update</a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 bg-gray-300 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">{{ $event->event_name }}</h2>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
        <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</p>
        <p><strong>Description:</strong> {{ $event->description }}</p>
    </div>

    <div class="flex justify-center mt-10 bg-gray-100">
        <div class="container text-center p-6 bg-white rounded shadow-md mb-12">
            <p class="text-xl font-semibold mb-4">Will you be attending?</p>
            
            <form action="{{ route('invitations.update', $invitation->id) }}" method="POST" class="space-x-2">
                @csrf
                @method('PUT')
                <button type="submit" name="attending" value="1" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Accept</button>
                <button type="submit" name="attending" value="0" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Decline</button>
            </form>
        </div>
    </div>

    
</x-app-layout>

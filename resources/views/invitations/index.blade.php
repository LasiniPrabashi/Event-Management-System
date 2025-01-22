<x-app-layout>
    <x-slot name="header">
            <div class="flex justify-between items-center">
                <a class="text-black text-2xl font-bold px-4 py-2 rounded">
                Invitations Send List
                </a>
                <div class="flex justify-between items-center gap-3">
                <a href="{{ route('invitations.create') }}">
                    <button type="button"
                            class="dark:bg-black px-4 py-2 rounded-md bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add new Invitations
                    </button>
                </a>
                
                </div>
            </div>
    </x-slot>

    <div class="space-y-4">
       
            
        <div class="space-y-4">
    <div class="space-y-4">
    @foreach ($invitations as $invitation)
        <a href="" class="block px-4 py-6 mx-10 my-2 border bg-slate-50 border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-lg">
                Event: {{ $invitation->event->event_name }}
            </div>
            <div class="text-gray-600 text-lg">
                Invited User: {{ $invitation->user->name }}
            </div>
            <div class="text-gray-600 text-lg">
                RSVP Status: {{ $invitation->rsvp_status }}
            </div>
        </a>
    @endforeach

    <div class="m-[30%]">
        {{ $invitations->links() }}
    </div>
</div>
</div>



</x-app-layout>
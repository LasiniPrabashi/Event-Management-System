<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 font-semibold text-2xl py-2 rounded">
                Send the Mail to friends
            </a>
        </div>
        
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        
        <!-- Event Details Display -->
        @if($selectedEvent)
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Event Details:</h2>
                <p class="text-blue-950 dark:text-gray-400">Event Name: {{ $selectedEvent->event_name }}</p>
                <p class="text-blue-950 dark:text-gray-400">Location: {{ $selectedEvent->location }}</p>
                <p class="text-blue-950 dark:text-gray-400">Date: {{ $selectedEvent->start_date }} to {{ $selectedEvent->end_date }}</p>
            </div>
        @endif
        
        <form id="invitationForm" action="{{ route('invitations.store') }}" method="POST" onsubmit="return showAlert()">
            @csrf

            <!-- Event Selection -->
            <div class="form-group mb-5">
                <label for="event_id">Event name:</label>
                <select name="event_id" id="event_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    <option value="">Select event name</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ $selectedEvent && $selectedEvent->id == $event->id ? 'selected' : '' }}>
                            {{ $event->event_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- User Selection -->
            <div class="form-group mb-5">
    <label>
        <input type="checkbox" id="selectAll" onclick="selectAllUsers()"> Select All Users
    </label>
</div>

<div class="form-group mb-5">
    <label for="user_ids">Users:</label>
    <select name="user_ids[]" id="user_ids" multiple required>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
    @endforeach
</select>

</div>

<!-- Display Selected Users -->
<div id="selectedUsers" class="mt-4 bg-gray-100 p-4 rounded shadow-md">
    <h3 class="font-semibold text-gray-700">Selected Users:</h3>
    <ul id="userList" class="list-disc pl-5 mt-2 text-gray-600"></ul>
</div>


            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send Invitation</button>
        </form>
    </div>

    <script>
    function selectAllUsers() {
        const selectAllCheckbox = document.getElementById("selectAll");
        const userSelect = document.getElementById("user_ids");
        
        
        for (let i = 0; i < userSelect.options.length; i++) {
            userSelect.options[i].selected = selectAllCheckbox.checked;
        }

       
        displaySelectedUsers();
    }

    function displaySelectedUsers() {
        const userList = document.getElementById("userList");
        userList.innerHTML = "";

        const selectedOptions = document.querySelectorAll("#user_ids option:checked");
        selectedOptions.forEach(option => {
            const name = option.getAttribute("data-name");
            const email = option.getAttribute("data-email");

            const listItem = document.createElement("li");
            listItem.textContent = `${name} (${email})`;

            userList.appendChild(listItem);
        });
    }
</script>



    <script>
        function showAlert() {   
            setTimeout(function() {
                alert('The invitation has been sent!'); 
            }, 1000); 
            return true;
        }
    </script>
</x-app-layout>

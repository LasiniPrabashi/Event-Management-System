<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="background-color: #F3E5F5;">
                    <h2 class="text-2xl mb-6">Add New Event</h2>

                    <form action="{{ route('event.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-4 flex space-x-4">


                            <div class="flex-1">
                                <label for="user_id" class="block text-gray-700">User ID:</label>
                                <input type="text" id="user_id" name="user_id" class="w-full px-4 py-2 border rounded-md @error('user_id') border-red-500 @enderror" value="{{ old('user_id') }}" />
                                @error('user_id')
                                <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex-1">
                                 <label for="event_name" class="block text-gray-700">Event Name:</label>
                                     <input type="text" id="event_name" name="event_name" class="w-full px-4 py-2 border rounded-md @error('event_name') border-red-500 @enderror" value="{{ old('event_name') }}" />
                                      @error('event_name')
                                     <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                     @enderror
                                  </div>

                                  <div class="flex-1">
                                      <label for="location" class="block text-gray-700">Location:</label>
                                       <input type="text" id="location" name="location" class="w-full px-4 py-2 border rounded-md @error('location') border-red-500 @enderror" value="{{ old('location') }}" />
                                        @error('location')
                                     <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                        @enderror
                                      </div>


                        </div>



                        <!-- Start Date, End Date, Start Time -->
                        <div class="mb-4 flex space-x-4">
                            <div class="flex-1">
                                <label for="start_date" class="block text-gray-700">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" class="w-full px-4 py-2 border rounded-md @error('start_date') border-red-500 @enderror" value="{{ old('start_date') }}" />
                                @error('start_date')
                                <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex-1">
                                <label for="end_date" class="block text-gray-700">End Date:</label>
                                <input type="date" id="end_date" name="end_date" class="w-full px-4 py-2 border rounded-md @error('end_date') border-red-500 @enderror" value="{{ old('end_date') }}" />
                                @error('end_date')
                                <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex-1">
                                <label for="start_time" class="block text-gray-700">Start Time:</label>
                                <input type="time" id="start_time" name="start_time" class="w-full px-4 py-2 border rounded-md @error('start_time') border-red-500 @enderror" value="{{ old('start_time') }}" />
                                @error('start_time')
                                <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                         <label for="is_adopted" class="block text-gray-700">Status:</label>
                             <select id="is_active" name="is_active" class="w-80 px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror">
                                   <option value="0" {{ old('is_adopted') == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_adopted') == 1 ? 'selected' : '' }}>Yes</option>
                             </select>
                             @error('is_active')
                                <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                                @enderror
                         </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description:</label>
                            <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-md @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-red text-sm" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex justify-end space-x-2">
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                                Save
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

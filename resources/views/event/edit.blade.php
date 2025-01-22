<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-2xl mb-6">Update Event</h2>


                  <form action="{{ route('event.update', $event->id) }}" method="POST">
                      @csrf
                      @method('PATCH') <!-- Use PATCH for updates -->

                      <div class="space-y-12">
                          <div class="border-b border-gray-900/10 pb-12">
                              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                  <!-- Event Name Field -->
                                  <div class="sm:col-span-2">
                                      <label for="event_name" class="block text-sm font-medium leading-6 text-gray-900">Event Name</label>
                                      <div class="mt-2">
                                          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                              <input
                                                  type="text"
                                                  name="event_name"
                                                  id="event_name"
                                                  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                  placeholder="Event Name"
                                                  value="{{ old('event_name', $event->event_name) }}"
                                                  required>
                                          </div>
                                          @error('event_name')
                                          <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                          @enderror
                                      </div>
                                  </div>

                                  <!-- Location Field -->
                                  <div class="sm:col-span-2">
                                      <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                                      <div class="mt-2">
                                          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                              <input
                                                  type="text"
                                                  name="location"
                                                  id="location"
                                                  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                  placeholder="Event Location"
                                                  value="{{ old('location', $event->location) }}"
                                                  required>
                                          </div>
                                          @error('location')
                                          <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                          @enderror
                                      </div>
                                  </div>

                                  <!-- Start Date Field -->
                                  <div class="sm:col-span-2">
                                      <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
                                      <div class="mt-2">
                                          <input
                                              type="date"
                                              name="start_date"
                                              id="start_date"
                                             class="w-80 px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror"
                                              value="{{ old('start_date', $event->start_date) }}"
                                              required>
                                          @error('start_date')
                                          <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                          @enderror
                                      </div>
                                  </div>

                                  <!-- End Date Field -->
                                  <div class="sm:col-span-2">
                                      <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                                      <div class="mt-2">
                                          <input
                                              type="date"
                                              name="end_date"
                                              id="end_date"
                                              class="w-80 px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror"
                                              value="{{ old('end_date', $event->end_date) }}"
                                              required>
                                          @error('end_date')
                                          <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                          @enderror
                                      </div>
                                  </div>

                                  <!-- Start Time Field -->
                                  <div class="sm:col-span-2">
                                      <label for="start_time" class="block text-sm font-medium leading-6 text-gray-900">Start Time</label>
                                      <div class="mt-2">
                                          <input
                                              type="time"
                                              name="start_time"
                                              id="start_time"
                                             class="w-80 px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror"
                                              value="{{ old('start_time', $event->start_time) }}"
                                              required>
                                          @error('start_time')
                                          <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                          @enderror
                                      </div>
                                  </div>

                                   <div class="sm:col-span-2">
                                        <label for="is_active" class="block text-sm font-medium leading-6 text-gray-900">Is Active</label>
                                              <div class="mt-2">
                                             <select
                                              name="is_active"
                                              id="is_active"
                                              class="w-80 px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror"
                                              required>
                                               <option value="1" {{ old('is_active', $event->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                                              <option value="0" {{ old('is_active', $event->is_active) == 0 ? 'selected' : '' }}>No</option>
                                           </select>
                                    @error('is_active')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                     </div>
                                    </div>


                                     <!-- Description Field -->
                                                                      <div class="sm:col-span-5">
                                                                          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                                                          <div class="mt-2">
                                                                              <textarea
                                                                                  name="description"
                                                                                  id="description"
                                                                                  class="w-full px-4 py-2 border rounded-md @error('is_active') border-red-500 @enderror"
                                                                                  placeholder="Event Description">{{ old('description', $event->description) }}</textarea>
                                                                              @error('description')
                                                                              <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                                                              @enderror
                                                                          </div>
                                                                      </div>

                              </div>
                          </div>
                      </div>

                      <div class="flex justify-start space-x-4">
                         <button type="submit" class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                               Update
                          </button>


                  </form>
                        <!-- Delete Button styled to match Update Button -->
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                          @csrf
                           @method('DELETE')
                           <button type="submit" class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                               Delete Event
                           </button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

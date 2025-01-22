<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepositoryInterface;  
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->getAllEvents();
        return view('event.index', compact('events'));
    }

    public function show($id)
    {
        $event = $this->eventRepository->getEventById($id);
        return view('event.show', compact('event'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->all();
        $this->eventRepository->create($data);

        return redirect()->route('event')->with('message', 'Event added successfully!');
    }

    public function edit($id)
    {
        $event = $this->eventRepository->getEventById($id);
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->all();
        $this->eventRepository->update($id, $data);

        return redirect()->route('event.show', $id)->with('message', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $this->eventRepository->delete($id);
        return redirect()->route('event.index')->with('message', 'Event deleted successfully!');
    }
}

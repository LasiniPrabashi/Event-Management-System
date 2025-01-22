<?php

namespace App\Http\Controllers;

use App\Mail\EventNotificationMail;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\InvitationService;

class InvitationController extends Controller
{
    protected $invitationService;

    public function __construct(InvitationService $invitationService)
    {
        $this->invitationService = $invitationService;
    }

    public function index()
    {
        $invitations = $this->invitationService->getAllPaginated(3);
        return view('invitations.index', compact('invitations'));
    }

    public function create(Request $request)
{
    // $events = Event::all(); 
    // $users = User::all();
    // return view('invitations.create', compact('events','users')); 

    $events = Event::all();
    $users = User::all();
    
    $selectedEventId = $request->query('event_id'); 
    $selectedEvent = null;
    
    if ($selectedEventId) {
        $selectedEvent = Event::find($selectedEventId);
    }

    return view('invitations.create', compact('events', 'users', 'selectedEvent'));
}


    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:users,id',
        ]);
    
        $data = $request->only(['event_id', 'user_ids']);
        $this->invitationService->createAndSendInvitation($data);

        return redirect()->back()->with('success', 'Invitations sent successfully!');
    }

    public function attend($id)
    {
        $invitation = $this->invitationService->getInvitationById($id);
        $event = $invitation->event;
        $invitedUser = $invitation->user;
    
        return view('invitations.attend', compact('invitation', 'event', 'invitedUser'));
    }

    public function rsvpLists($eventId)
    {
        $rsvpLists = $this->invitationService->getRsvpLists($eventId);

        return view('invitations.rsvp', [
            'pendingInvitations' => $rsvpLists['pending'],
            'acceptedInvitations' => $rsvpLists['accepted'],
            'declinedInvitations' => $rsvpLists['declined'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $status = $request->input('attending') == 1 ? 'accepted' : 'declined';
        $this->invitationService->updateRsvpStatus($id, $status);
    }
}

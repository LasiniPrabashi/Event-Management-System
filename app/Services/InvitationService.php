<?php

namespace App\Services;

use App\Mail\EventNotificationMail;
use App\Repositories\InvitationRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class InvitationService
{
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }

    public function getAllPaginated($perPage = 3)
    {
        return $this->invitationRepository->getAllPaginated($perPage);
    }

    public function createAndSendInvitation($data)
    {
        foreach ($data['user_ids'] as $userId) {
            $invitation = $this->invitationRepository->create([
                'event_id' => $data['event_id'],
                'user_id' => $userId,
                'rsvp_status' => 'pending',
            ]);
    
            Mail::to($invitation->user->email)->send(new EventNotificationMail($invitation->event, $invitation));
        }
        return true;
    }

    public function getInvitationById($id)
    {
        return $this->invitationRepository->findById($id);
    }
    
    public function getRsvpLists($eventId)
    {
        return [
            'pending' => $this->invitationRepository->getByStatus($eventId, 'pending'),
            'accepted' => $this->invitationRepository->getByStatus($eventId ,'accepted'),
            'declined' => $this->invitationRepository->getByStatus($eventId, 'declined'),
        ];
    }


    public function updateRsvpStatus($id, $status)
    {
        $this->invitationRepository->updateStatus($id, $status);
    }
}

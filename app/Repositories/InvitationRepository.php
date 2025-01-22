<?php

namespace App\Repositories;

use App\Models\Invitation;
use App\Repositories\InvitationRepositoryInterface;

class InvitationRepository implements InvitationRepositoryInterface
{
    public function getAllPaginated($perPage = 3)
    {
        return Invitation::with('event')->paginate($perPage);
    }

    public function create(array $data)
    {
        return Invitation::create($data);
    }

    public function findById($id)
    {
        return Invitation::findOrFail($id);
    }

    public function getByStatus($eventId , $status)
    {
        return Invitation::where('event_id', $eventId)
        ->where('rsvp_status', $status)->with('event')->get();
    }

    

    public function updateStatus($id, $status)
    {
        $invitation = Invitation::findOrFail($id);
        $invitation->rsvp_status = $status;
        $invitation->save();
    }

}

<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EventRepository implements EventRepositoryInterface
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Event::latest()->paginate($perPage);
    }

    public function getAllEvents(int $pagination = 3): LengthAwarePaginator
    {
        return Event::latest()->paginate($pagination);
    }

    public function getEventById(int $id): ?Event
    {
        return Event::find($id);
    }

    public function create(array $data): Event
    {
        return Event::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $event = $this->getEventById($id);
        return $event->update($data);
    }

    public function delete(int $id): bool
    {
        $event = $this->getEventById($id);
        return $event->delete();
    }
}

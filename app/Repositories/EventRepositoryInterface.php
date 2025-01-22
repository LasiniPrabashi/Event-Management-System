<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EventRepositoryInterface
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator;
    public function getAllEvents(int $pagination = 3): LengthAwarePaginator;
    public function getEventById(int $id): ?Event;
    public function create(array $data): Event;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}

<?php

namespace App\Services\Helper;

use App\Repository\TicketsRepository;

class FetchTickets
{
    private TicketsRepository $ticketsRepository;

    public function __construct(TicketsRepository $ticketsRepository)
    {
        $this->ticketsRepository = $ticketsRepository;
    }

    public function getAll(): array
    {
        return $this->ticketsRepository->findAll();
    }
}
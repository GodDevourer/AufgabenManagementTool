<?php

namespace App\Services\Helper;

use App\DTO\TicketDTO;

interface TicketCreatorInterface
{
    public function persist(TicketDTO $ticketParameters): void;
}
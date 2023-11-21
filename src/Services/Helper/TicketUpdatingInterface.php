<?php

namespace App\Services\Helper;

use App\DTO\TicketDTO;

interface TicketUpdatingInterface
{
    public function update(TicketDTO $ticketParameters, int $id): void;
}
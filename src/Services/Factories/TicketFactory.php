<?php

namespace App\Services\Factories;

use App\Entity\Tickets;

class TicketFactory
{
    public function get(): Tickets
    {
        return new Tickets();
    }
}
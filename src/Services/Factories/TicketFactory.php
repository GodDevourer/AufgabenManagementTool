<?php

namespace App\Services\Factories;

use App\Entity\Tickets;

class TicketFactory implements TicketFactoryInterface
{
    public function get(): Tickets
    {
        return new Tickets();
    }
}
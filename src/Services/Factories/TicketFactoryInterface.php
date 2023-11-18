<?php

namespace App\Services\Factories;

use App\Entity\Tickets;

interface TicketFactoryInterface
{
    public function get(): Tickets;
}
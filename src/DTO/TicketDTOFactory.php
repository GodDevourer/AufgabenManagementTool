<?php

namespace App\DTO;

class TicketDTOFactory implements TicketDTOFactoryInterface
{
    public function create(int $sort, string $text, string $title, string $person): TicketDTO
    {
        return new TicketDTO($sort, $text, $title, $person);
    }
}
<?php

namespace App\DTO;

class TicketDTOFactory
{
    public function create(int $id, int $sort, string $text, string $title, string $person): TicketDTO
    {
        return new TicketDTO($id, $sort, $text, $title, $person);
    }
}
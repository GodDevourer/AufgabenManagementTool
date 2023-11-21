<?php

namespace App\DTO;

interface TicketDTOFactoryInterface
{
    public function create(int $sort, string $text, string $title, string $person): TicketDTO;
}
<?php

namespace App\Services\Helper;

interface TicketDeletionInterface
{
    public function delete(int $id): void;
}
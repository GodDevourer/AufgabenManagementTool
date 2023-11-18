<?php

namespace App\Services\Helper;

use App\Entity\Tickets;
use App\Repository\TicketsRepository;
use Doctrine\ORM\EntityManagerInterface;

class TicketDeletion implements TicketDeletionInterface
{
    private EntityManagerInterface $entityManager;

    private TicketsRepository $ticketsRepository;

    public function __construct(EntityManagerInterface $entityManager, TicketsRepository $ticketsRepository)
    {
        $this->entityManager = $entityManager;
        $this->ticketsRepository = $ticketsRepository;
    }

    public function delete(int $id): void
    {
        $ticket = $this->ticketsRepository->find($id);

        if ($ticket instanceof Tickets) {
            $this->entityManager->remove($ticket);
            $this->entityManager->flush();
        }
    }
}
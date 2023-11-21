<?php

namespace App\Services\Helper;

use App\DTO\TicketDTO;
use App\Entity\Tickets;
use App\Repository\TicketsRepository;
use Doctrine\ORM\EntityManagerInterface;

class TicketUpdating implements TicketUpdatingInterface
{
    private EntityManagerInterface $entityManager;
    private TicketsRepository $ticketsRepository;

    public function __construct(EntityManagerInterface $entityManager, TicketsRepository $ticketsRepository)
    {
        $this->entityManager = $entityManager;
        $this->ticketsRepository = $ticketsRepository;
    }

    public function update(TicketDTO $ticketParameters, int $id): void
    {
        $ticket = $this->ticketsRepository->find($id);

        if ($ticket instanceof Tickets) {
            $ticket
                ->setTitle($ticketParameters->getTitle())
                ->setText($ticketParameters->getText())
                ->setSort($ticketParameters->getSort())
                ->setPerson($ticketParameters->getPerson());

            $this->entityManager->persist($ticket);
            $this->entityManager->flush();
        }
    }
}
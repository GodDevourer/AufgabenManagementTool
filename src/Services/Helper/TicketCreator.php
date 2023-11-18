<?php

namespace App\Services\Helper;

use App\DTO\TicketDTO;
use App\Services\Factories\TicketFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class TicketCreator implements TicketCreatorInterface
{
    private TicketFactoryInterface $TicketFactoryInterface;
    private EntityManagerInterface $entityManager;

    public function __construct(TicketFactoryInterface $TicketFactoryInterface, EntityManagerInterface $entityManager)
    {
        $this->TicketFactoryInterface = $TicketFactoryInterface;
        $this->entityManager = $entityManager;
    }

    public function persist(TicketDTO $ticketParameters): void
    {
        $newTicket = $this->TicketFactoryInterface->get();

        $newTicket
            ->setTitle($ticketParameters->getTitle())
            ->setText($ticketParameters->getText())
            ->setSort($ticketParameters->getSort())
            ->setPerson($ticketParameters->getPerson());

        $this->entityManager->persist($newTicket);
        $this->entityManager->flush();
    }
}
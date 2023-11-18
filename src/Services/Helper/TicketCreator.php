<?php

namespace App\Services\Helper;

use App\Services\Factories\TicketFactory;
use Doctrine\ORM\EntityManagerInterface;

class TicketCreator
{
    private TicketFactory $ticketFactory;
    private EntityManagerInterface $entityManager;

    public function __construct(TicketFactory $ticketFactory, EntityManagerInterface $entityManager)
    {
        $this->ticketFactory = $ticketFactory;
        $this->entityManager = $entityManager;
    }

    public function persist(array $ticketParameter): void
    {
        $newTicket = $this->ticketFactory->get();

        $newTicket
            ->setTitle($ticketParameter['title'])
            ->setText($ticketParameter['text'])
            ->setSort($ticketParameter['sort'])
            ->setPerson($ticketParameter['person']);

        $this->entityManager->persist($newTicket);
        $this->entityManager->flush();
    }
}
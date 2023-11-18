<?php

namespace App\Controller;

use App\Services\Helper\TicketDeletion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteTicket extends AbstractController
{
    private TicketDeletion $ticketDeletion;

    public function __construct(TicketDeletion $ticketDeletion)
    {
        $this->ticketDeletion = $ticketDeletion;
    }

    #[Route(path: '/delete/{id}')]
    public function delete(int $id): JsonResponse
    {
        $this->ticketDeletion->delete($id);

        return $this->json('');
    }
}
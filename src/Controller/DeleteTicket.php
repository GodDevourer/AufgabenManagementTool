<?php

namespace App\Controller;

use App\Services\Helper\TicketDeletionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteTicket extends AbstractController
{
    private TicketDeletionInterface $TicketDeletionInterface;

    public function __construct(TicketDeletionInterface $TicketDeletionInterface)
    {
        $this->TicketDeletionInterface = $TicketDeletionInterface;
    }

    #[Route(path: '/delete/{id}')]
    public function delete(int $id): JsonResponse
    {
        $this->TicketDeletionInterface->delete($id);

        return $this->json('');
    }
}
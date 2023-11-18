<?php

namespace App\Controller;

use App\Services\Helper\FetchTickets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TicketFetch extends AbstractController
{
    private FetchTickets $tickets;

    public function __construct(FetchTickets $tickets)
    {
        $this->tickets = $tickets;
    }

    #[Route(path: '/tickets')]
    public function showTable(): JsonResponse
    {
        $tickets = $this->tickets->getAll();

        return $this->json($tickets);
    }
}
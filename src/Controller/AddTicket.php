<?php

namespace App\Controller;

use App\Services\Helper\TicketCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddTicket extends AbstractController
{

    private TicketCreator $ticketCreator;

    public function __construct(TicketCreator $ticketCreator)
    {
        $this->ticketCreator = $ticketCreator;
    }

    #[Route(path: '/add')]
    public function add(Request $request): JsonResponse
    {
        $ticketParameters = [
            'sort' => $request->getPayload()->get('sort'),
            'title' => $request->getPayload()->get('title'),
            'text' => $request->getPayload()->get('text'),
            'person' => $request->getPayload()->get('person'),
        ];

        $this->ticketCreator->persist($ticketParameters);

        return $this->json('');
    }
}
<?php

namespace App\Controller;

use App\DTO\TicketDTOFactory;
use App\Services\Helper\TicketUpdating;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UpdateTicket extends AbstractController
{
    private TicketUpdating $ticketUpdating;
    private TicketDTOFactory $ticketDTOFactory;

    public function __construct(TicketUpdating $ticketUpdating, TicketDTOFactory $ticketDTOFactory)
    {
        $this->ticketUpdating = $ticketUpdating;
        $this->ticketDTOFactory = $ticketDTOFactory;
    }

    #[Route(path: '/update')]
    public function update(Request $request): JsonResponse
    {
        $ticketDTO = $this->ticketDTOFactory->create(
            $request->getPayload()->get('id'),
            $request->getPayload()->get('sort'),
            $request->getPayload()->get('text'),
            $request->getPayload()->get('title'),
            $request->getPayload()->get('person')
        );

        $this->ticketUpdating->update($ticketDTO);

        return $this->json('');
    }
}
<?php

namespace App\Controller;

use App\DTO\TicketDTOFactoryInterface;
use App\Services\Helper\TicketUpdatingInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UpdateTicket extends AbstractController
{
    private TicketUpdatingInterface $TicketUpdatingInterface;
    private TicketDTOFactoryInterface $ticketDTOFactory;

    public function __construct(
        TicketUpdatingInterface $TicketUpdatingInterface,
        TicketDTOFactoryInterface $ticketDTOFactory
    ) {
        $this->TicketUpdatingInterface = $TicketUpdatingInterface;
        $this->ticketDTOFactory = $ticketDTOFactory;
    }

    #[Route(path: '/update')]
    public function update(Request $request): JsonResponse
    {
        $ticketDTO = $this->ticketDTOFactory->create(
            $request->getPayload()->get('sort'),
            $request->getPayload()->get('text'),
            $request->getPayload()->get('title'),
            $request->getPayload()->get('person')
        );

        $this->TicketUpdatingInterface->update($ticketDTO, $request->getPayload()->get('id'));

        return $this->json('');
    }
}
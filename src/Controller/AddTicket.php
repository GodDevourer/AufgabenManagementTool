<?php

namespace App\Controller;

use App\DTO\TicketDTOFactoryInterface;
use App\Services\Helper\TicketCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddTicket extends AbstractController
{

    private TicketCreator $ticketCreator;
    private TicketDTOFactoryInterface $ticketDTOFactory;

    public function __construct(TicketCreator $ticketCreator, TicketDTOFactoryInterface $ticketDTOFactory)
    {
        $this->ticketCreator = $ticketCreator;
        $this->ticketDTOFactory = $ticketDTOFactory;
    }

    #[Route(path: '/add')]
    public function add(Request $request): JsonResponse
    {
        $ticketDTO = $this->ticketDTOFactory->create(
            $request->getPayload()->get('sort'),
            $request->getPayload()->get('text'),
            $request->getPayload()->get('title'),
            $request->getPayload()->get('person')
        );

        $this->ticketCreator->persist($ticketDTO);

        return $this->json('');
    }
}
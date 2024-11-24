<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Repository\EventsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventsController extends AbstractController
{ private $em;
    public function __construct(EntityManagerInterface $em) { $this->em = $em; }
    #[Route('/events', name: 'app_event')]
    public function listEvents(EventsRepository $er,UserRepository $ur): Response
    {
        $user=$ur->find(1);
        $reservations = $this->em->getRepository(Reservation::class)->findBy(['User' => $user]);
        $registeredEvents = array_map(function($reservation) {
            return $reservation->getEvent()->getId(); },
            $reservations);
        $events = $er->findAll();
        return $this->render('events/listEvents.html.twig', [
            'events' => $events,
            'field' => "",
            'value' => "",
            'registeredEvents' => $registeredEvents,
        ]);
    }

    #[Route('/events/filter', name: 'app_event_filter', methods: ['GET'])]
    public function filterEvents(Request $request, EventsRepository $er): Response
    {
        $field = $request->query->get('field'); // e.g., 'description', 'name', etc.
        $value = $request->query->get('value'); // e.g., 'workshop'

        if ($field && $value) {
            $events = $er->filterByField($field, $value);
        } else {
            $events = $er->findAll(); // Default to all events if no filter is applied
        }

        return $this->render('events/listEvents.html.twig', [
            'events' => $events,
            'field' => $field,
            'value' => $value,
        ]);
    }
}

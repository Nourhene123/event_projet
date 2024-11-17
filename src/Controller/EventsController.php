<?php

namespace App\Controller;

use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventsController extends AbstractController
{
    #[Route('/events', name: 'app_event')]
    public function listEvents(EventsRepository $er): Response
    {
        $events = $er->findAll();
        return $this->render('events/listEvents.html.twig', [
            'events' => $events,
            'field' => "",
            'value' => "",
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

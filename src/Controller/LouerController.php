<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LouerController extends AbstractController
{
    #[Route('/louer', name: 'app_louer')]
    public function index(): Response
    {
        return $this->render('louer/index.html.twig', [
            'controller_name' => 'LouerController',
        ]);
    }
}

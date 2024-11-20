<?php

namespace App\Controller;

use App\Entity\Louer;
use App\Form\LouerType;
use App\Repository\LouerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/louer')]
final class LouerController extends AbstractController
{
    #[Route(name: 'app_louer_index', methods: ['GET'])]
    public function index(LouerRepository $louerRepository): Response
    {
        return $this->render('louer/index.html.twig', [
            'louers' => $louerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_louer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $louer = new Louer();
        $form = $this->createForm(LouerType::class, $louer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($louer);
            $entityManager->flush();

            return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('louer/new.html.twig', [
            'louer' => $louer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_louer_show', methods: ['GET'])]
    public function show(Louer $louer): Response
    {
        return $this->render('louer/show.html.twig', [
            'louer' => $louer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_louer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Louer $louer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LouerType::class, $louer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('louer/edit.html.twig', [
            'louer' => $louer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_louer_delete', methods: ['POST'])]
    public function delete(Request $request, Louer $louer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$louer->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($louer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
    }
}

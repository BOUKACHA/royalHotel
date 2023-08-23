<?php

namespace App\Controller;

use App\Entity\CategorieChambre;
use App\Form\CategorieChambreType;
use App\Repository\CategorieChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/categorie/chambre')]
class AdminCategorieChambreController extends AbstractController
{
    #[Route('/', name: 'app_admin_categorie_chambre_index', methods: ['GET'])]
    public function index(CategorieChambreRepository $categorieChambreRepository): Response
    {
        return $this->render('admin_categorie_chambre/index.html.twig', [
            'categorie_chambres' => $categorieChambreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_categorie_chambre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $categorieChambre = new CategorieChambre();
        $form = $this->createForm(CategorieChambreType::class, $categorieChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On génére le slug de la catégorie car il est obligatoire et n'est pas présent dans le formulaire
            $categorieChambre->setSlug($sluggerInterface->slug(strtolower($categorieChambre->getNom())));
            $entityManager->persist($categorieChambre);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_categorie_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_chambre/new.html.twig', [
            'categorie_chambre' => $categorieChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_categorie_chambre_show', methods: ['GET'])]
    public function show(CategorieChambre $categorieChambre): Response
    {
        return $this->render('admin_categorie_chambre/show.html.twig', [
            'categorie_chambre' => $categorieChambre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_categorie_chambre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieChambre $categorieChambre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieChambreType::class, $categorieChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_categorie_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_chambre/edit.html.twig', [
            'categorie_chambre' => $categorieChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_categorie_chambre_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieChambre $categorieChambre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieChambre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categorieChambre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_categorie_chambre_index', [], Response::HTTP_SEE_OTHER);
    }
}

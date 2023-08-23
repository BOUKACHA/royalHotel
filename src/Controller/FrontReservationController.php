<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_front_reservation')]
    public function reservation($id, ChambreRepository $chambreRepository, EntityManagerInterface $entityManagerInterface, Request $request): Response
    {
        $chambre = $chambreRepository->find($id);
        $user = $this->getUser();
        //
        if(is_null($user)){
            // $this->addflash()
            dd('Vous devez etre connectés pour réserver');
        }
        $reservation = new Reservation();
        $reservation->setChambre($chambre);
        $reservation->setUser($user);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // Calcul du montant
            $d1 = $form->getData()->getDateArrivee();
            $d2 = $form->getData()->getDateDepart();
            $nb = $d1->diff($d2);
            $nbJour = $nb->format("%a");
            $reservation->setMontant($nbJour*$chambre->getPrix());
            // Sauvegarde en bdd de la réservation
            $entityManagerInterface->persist($reservation);
            $entityManagerInterface->flush();
            // Redirection et message
            $this->addFlash("success", 'Votre réservation a bien été prise en compte.');
            $this->redirectToRoute("app_home2");
        }

        //
        return $this->render('front_reservation/index.html.twig', [
            'form' => $form->createView(),
            'chambre'=>$chambre
        ]);
    }
}

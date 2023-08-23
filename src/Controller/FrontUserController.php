<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontUserController extends AbstractController
{
    #[Route('/front/user', name: 'app_front_user')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface,
    UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        // On récupère l'utilisateur connecté
        $user = $this->getUser();
        // On crée un formulaire de User avec les datas du user connecté et on passe à la vue
        $form =$this->createForm(UserType::class, $user);
        // On hydrate le user avec les données du formulaire posté potentiellement.
        $form->handleRequest($request);
        // On vérifie que le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
        // dd($fom->getData()); // Récupèrer l'instance du user mais pas les propriétés mapped false
        // dd($form->all()); //Récupèrer toutes les données (champs) du formulaire y compris les mapped false
         // dd($form->get('plainPassword')->getData()); // On récupère les données d'un champ en particulier y compris les mapped false
        // //dd($request->request->get('plainPassword'));  On récupère la valeur d'un champ non pas dans le formulaire,
           // mais dans la requête. $request->request récupère les données de la requête POST pour la requête GETil faut
           // utiliser $request->query.
            if(!is_null($request->request->get('plainPassword'))){
            $user->setPassword($userPasswordHasherInterface->hashPassword($user, $request->request->get('plainPassword') ));
            $entityManagerInterface->persist($user);
        }
            
            $entityManagerInterface->flush();
            $this->addFlash("success", "Votre profil à bien été modifié");
            // On redirige vers la page de profil.ret
            return $this->redirectToRoute('app_front_user');
        }
        return $this->render('front_user/index.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
}

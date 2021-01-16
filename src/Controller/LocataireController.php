<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Locataire;
use App\Repository\LocataireRepository;
use App\Form\LocataireType;

class LocataireController extends AbstractController
{
  private $locataireRepository;

    public function __construct(LocataireRepository $locataireRepository){
      $this->locataireRepository = $locataireRepository;
    }
    /**
     * @Route("/locataire/new", name="locataire_add")
     * @Route("/locataire/{id}/edit", name="locataire_update")
     */
    public function formLocataire($id=0,Request $req): Response
    {
      $locataire = $this->locataireRepository->find($id);
      $modif = true;
      if(!isset($locataire)){
        $locataire = new Locataire();
        $modif = false;
      }
      $form = $this->createForm(LocataireType::class,$locataire);
      $form->handleRequest($req);
      if ($form->isSubmitted() && $form->isValid()) {
         $this->locataireRepository->create($locataire);
         return $this->redirectToRoute('locataire' ,["locataires" => $this->locataireRepository->findAll()]);
      }
        return $this->render('locataire/add.html.twig', [
            'form' => $form->createView(),
            'modif' => $modif,
        ]);
    }

    /**
     * @Route("locataire/{id}/delete", name="locataire_delete")
     */
    public function delete($id){
      return $this->redirectToRoute('locataire',
                                    ["locataires" => $this->locataireRepository->delete($id)]
                                   );

    }
}

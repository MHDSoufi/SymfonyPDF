<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\BienType;
use App\Entity\Bien;
use App\Entity\Suplement;
use App\Repository\BienRepository;
use App\Repository\SuplementRepository;

class BienController extends AbstractController
{
  private $bienRepository;
    /**
     * [__construct description]
     * @param BienRepository $bienRepository [description]
     */
    public function __construct(BienRepository $bienRepository){
      $this->bienRepository = $bienRepository;
    }
    /**
     * @Route("/bien/new", name="bien_add")
     * @Route("/bien/{id}/edit", name="bien_update")
     */
    public function index($id=0,Request $req, SuplementRepository $supRepo): Response
    {
      $bien = $this->bienRepository->find($id);
      $modif = true;
      if (!isset($bien)) {
        $bien = new Bien();
        $modif = false;
      }else{
        $suplements = $supRepo->findBy([
          "BienId" => $bien->getId()
        ]);
        dd($bien);
      }

      $form = $this->createForm(BienType::class, $bien);
      $form->handleRequest($req);
      if ($form->isSubmitted() && $form->isValid()) {
        $this->bienRepository->create($bien);
        return $this->redirectToRoute('bien',
         ['biens'=> $this->bienRepository->findAll()]);
      }
        return $this->render('bien/add.html.twig', [
            'form' => $form->createView(),
            "modif" => $modif
        ]);
    }
}

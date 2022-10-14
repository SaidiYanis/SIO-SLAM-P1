<?php

namespace App\Controller;

use App\Entity\EquipementBureau;
use App\Repository\EquipementBureauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
class EquipementBureauController extends AbstractController
{   
    #[Route('/equipement/bureau', name: 'app_equipement_bureau')]
    public function index(Request $request,Environment $twig,EquipementBureauRepository $equipementbureauRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $equipementbureauRepository->getEquipementbureauPaginator($offset);

        return new Response($twig->render('equipement_bureau/index.html.twig', [
            'equipementbureau' => $paginator,
            'previous' => $offset - EquipementBureauRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + EquipementBureauRepository::PAGINATOR_PER_PAGE),
                ]));
    }

    #[Route('/equipement/bureau/detail/{id}', name: 'app_equipement_bureau_detail')]
    public function show(Request $request,Environment $twig,EquipementBureau $equipementbureau,EquipementBureauRepository $equipementbureauRepository): Response
    {
         // $request->query->getInt('id',$id)
           // $offset = $request->query->getInt('id',$id)
           // $id = $equipementbureauRepository->findOneBySomeField($id)

        return new Response($twig->render('equipement_bureau/detail.html.twig', [
                    
                    
                   'equipementbureau' => $equipementbureau
                    
                ]));
    } 
}           




/*     Old Text
 return $this->render('equipement_bureau/index.html.twig', [
    'controller_name' => 'EquipementBureauController',
]); */

/*#[Route('/equipement/bureau/detail', name: 'app_detail')]
public function show(Request $request,Environment $twig, EquipementBureau $equipementbureau): Response
{
    return new Response($twig->render('equipement_bureau/detail.html.twig', [
                'equipementbureau' => $equipementbureau,
                'equipementsouris' => $paginator,
                'previous' => $offset - EquipementBureau::PAGINATOR_PER_PAGE,
                'next' => min(count($paginator), $offset + EquipementBureau::PAGINATOR_PER_PAGE),
            ]));
}     */

/*
#[Route('/equipement/bureau', name: 'app_equipement_bureau')]
public function index(Environment $twig, EquipementBureauRepository $equipementbureauRepository): Response
{
    return new Response($twig->render('equipement_bureau/index.html.twig', [
                'equipementsbureaux' => $equipementbureauRepository->findAll(),
            ]));
}  */
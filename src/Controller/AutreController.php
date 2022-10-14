<?php
namespace App\Controller;

use App\Entity\Autre;
use App\Repository\AutreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
class AutreController extends AbstractController
{   
    #[Route('/autre', name: 'app_autre')]
    public function index(Request $request,Environment $twig,AutreRepository $autreRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $autreRepository->getAutrePaginator($offset);

        return new Response($twig->render('autre/index.html.twig', [
            'autre' => $paginator,
            'previous' => $offset - AutreRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + AutreRepository::PAGINATOR_PER_PAGE),
                ]));
    }

    #[Route('autre/detail/{id}', name: 'app_autre_detail')]
    public function show(Request $request,Environment $twig,Autre $autre,AutreRepository $autreRepository): Response
    {
         // $request->query->getInt('id',$id)
           // $offset = $request->query->getInt('id',$id)
           // $id = $equipementbureauRepository->findOneBySomeField($id)

        return new Response($twig->render('autre/detail.twig', [
                    
                    
                   'autre' => $autre
                    
                ]));
    } 
}           
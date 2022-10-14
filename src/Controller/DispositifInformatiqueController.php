<?php
namespace App\Controller;

use App\Entity\DispositifInformatique;
use App\Repository\DispositifInformatiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
class DispositifInformatiqueController extends AbstractController
{   
    #[Route('/dispositif/informatique', name: 'app_dispositif_informatique')]
    public function index(Request $request,Environment $twig,DispositifInformatiqueRepository $dispositifinformatiqueRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $dispositifinformatiqueRepository->getDispositifinformatiquePaginator($offset);

        return new Response($twig->render('dispositif_informatique/index.html.twig', [
            'dispositifinformatique' => $paginator,
            'previous' => $offset - DispositifInformatiqueRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + DispositifInformatiqueRepository::PAGINATOR_PER_PAGE),
                ]));
    }

    #[Route('/dispositif/informatique/detail/{id}', name: 'app_dispositif_informatique_detail')]
    public function show(Request $request,Environment $twig,DispositifInformatique $dispositifinformatique,DispositifInformatiqueRepository $dispositifinformatiqueRepository): Response
    {
         // $request->query->getInt('id',$id)
           // $offset = $request->query->getInt('id',$id)
           // $id = $equipementbureauRepository->findOneBySomeField($id)

        return new Response($twig->render('dispositif_informatique/detail.twig', [
                    
                    
                   'dispositifinformatique' => $dispositifinformatique
                    
                ]));
    } 
}           
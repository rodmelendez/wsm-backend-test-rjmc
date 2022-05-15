<?php

namespace App\Controller;

use App\Document\Account;
use App\Document\Metric;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager;

class ReportsController extends AbstractController
{
    //#[Route('/reports', name: 'app_reports')]
    
    /**
    * @Route("/reports/app")
    */
    public function index(): Response
    {
        return $this->render('reports/index.html.twig', [
            'controller_name' => 'ReportsController',
        ]);
    }

    /**
    * @Route("/reports/accounts")
    */
    public function getAccounts(DocumentManager $dm): Response
    {
        $data =  $dm->getRepository(Account::class)
                      ->findAllAccountById();

        /*return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );*/
        return $this->json([
           'cuentas' => $data,
        ]);
    }

    /**
     * @Route("/reports/metrics")
     */
    public function getMetrics(DocumentManager $dm): Response
    {
        $data =  $dm->getRepository(Metric::class)
                    ->findAllMetricById();

        /*return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );*/
        return $this->json([
            'cuentas' => $data,
        ]);
    }
}

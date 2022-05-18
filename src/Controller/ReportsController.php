<?php

namespace App\Controller;

use App\Document\Account;
use App\Document\Metric;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Request;

class ReportsController extends AbstractController
{
    //#[Route('/reports', name: 'app_reports')]
    
    /**
    * @Route("/reports/app")
    */
    public function index(DocumentManager $dm): Response
    {
        $datas =  $dm->getRepository(Account::class)->getReports();
        return $this->render('reports/index.html.twig', [
            'controller_name' => 'ReportsController',
            'cuentas' => $datas,
        ]);
    }

    /**
    * @Route("/reports/accounts")
    */
    public function getAccounts(DocumentManager $dm): Response
    {
        $data =  $dm->getRepository(Account::class)->getReports();

        return $this->json([
           'cuentas' => $data,
        ]);
    }

    /**
     * @Route("/reports/show/{id}",  name="data_show", methods={"GET"})
     */
    public function getAccount(DocumentManager $dm, string $id): Response
    {
        $data =  $dm->getRepository(Account::class)->getReport($id);

        return $this->json([
            'data' => $data,
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

<?php

namespace AppBundle\Controller;

use AppBundle\Service\UtilsService;
use Psr\Log\Test\LoggerInterfaceTest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function indexAction(Request $request, UtilsService $utilsService)
    {
       // $logger->info($utilsService->getRandomString(10));
        // replace this example code with whatever you need
        $utilsService->envoieMail('bjr', 'belabed.jihen@gmail.com','test');


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


}

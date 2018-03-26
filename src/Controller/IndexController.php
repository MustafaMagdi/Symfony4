<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     * @Method({"GET"})
     *
     * @return Response
     */
    public function index(): Response
    {
        // @todo: we have to configure it to work based on a param is being sent with the request
        // for profiling
        // return $this->render('debug.html.twig');

        //
        return $this->json(['data of index()']);
    }

    /**
     * @Route("/test/route")
     * @Method({"POST"})
     *
     * @return Response
     */
    public function testRout(): Response
    {
        return $this->json(['data of testRoute()']);
    }
}

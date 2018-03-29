<?php

namespace App\Controller;

use App\Annotations\Guard;
use App\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    use ControllerTrait;

    /**
     * @Route("/")
     * @Method({"GET"})
     * @Guard()
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->success(['data of index()']);
    }

    /**
     * @Route("/test/route")
     * @Method({"POST"})
     *
     * @return Response
     */
    public function testRout(): Response
    {
        return $this->created(['data of testRoute()']);
    }
}

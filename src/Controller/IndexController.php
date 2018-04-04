<?php

namespace App\Controller;

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
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->success(['homepage']);
    }

    /**
     * @Route("/test/route1")
     * @Method({"GET"})
     *
     * @return Response
     */
    public function route1(): Response
    {
        return $this->created(['test/route1']);
    }

    /**
     * @Route("/test/route2")
     * @Method({"GET"})
     *
     * @return Response
     */
    public function route2(): Response
    {
        return $this->created(['test/route2']);
    }
}

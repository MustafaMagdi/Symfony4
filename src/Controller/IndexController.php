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

    /**
     * @Route("/profile")
     */
    public function profile()
    {
        return new Response('<html><body>Profile page!</body></html>');
    }

    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}

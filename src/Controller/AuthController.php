<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    /**
     * @Route("/login")
     * @Method({"POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function token(Request $request): Response
    {
    }
}

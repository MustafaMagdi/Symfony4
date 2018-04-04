<?php

namespace App\Controller;

use App\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends AbstractController
{
    use ControllerTrait;

    /**
     * @Route("/profile/view")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileView()
    {
        return $this->success(['Profile page view!']);
    }

    /**
     * @Route("/profile/edit")
     * @Method({"POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileEdit()
    {
        return $this->updated(['Profile page edited!']);
    }
}

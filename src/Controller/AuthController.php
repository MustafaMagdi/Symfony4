<?php

namespace App\Controller;

use App\Models\Auth;
use App\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    use ControllerTrait;

    protected $authModel;

    /**
     * AuthController constructor.
     *
     * @param \App\Models\Auth $authModel
     */
    public function __construct(Auth $authModel)
    {
        $this->authModel = $authModel;
    }

    /**
     * @Route("/auth")
     * @Method({"POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function auth(Request $request): Response
    {
        $token = $this->authModel->generateToken($request);

        return $this->created([
            'token' => $token,
        ]);
    }
}

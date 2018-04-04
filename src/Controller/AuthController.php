<?php

namespace App\Controller;

use App\Traits\ControllerTrait;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    use ControllerTrait;

    /**
     * @var \Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface
     */
    protected $encoder;

    /**
     * AuthController constructor.
     *
     * @param \Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface $encoder
     */
    public function __construct(JWTEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Route("/login")
     * @Method({"POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function token(Request $request): Response
    {
        $token = $this->encoder->encode([
            'username' => 'username',
            'email'    => 'username@domain.com',
        ]);

        return $this->created([
            'token' => $token,
        ]);
    }
}

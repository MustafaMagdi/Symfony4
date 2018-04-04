<?php

namespace App\Models;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Auth
 *
 * @package App\Models
 */
class Auth
{
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return string
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function generateToken(Request $request): string
    {
        $token = $this->encoder->encode([
            'username' => 'username',
            'email'    => 'username@domain.com',
        ]);

        return $token;
    }
}

<?php

namespace App\React;

/**
 * todo: use https://symfony.com/doc/current/components/psr7.html
 *
 * Class Response
 *
 * @package App\React
 */
class Response
{
    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;

    public function __construct(\Symfony\Component\HttpFoundation\Response $response)
    {
        $this->response = $response;
    }
}
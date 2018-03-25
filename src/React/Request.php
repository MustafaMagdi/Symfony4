<?php

namespace App\React;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Request
 *
 * @package App\React
 */
class Request
{
    /**
     * @var \Psr\Http\Message\ServerRequestInterface
     */
    protected $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * here we want to make sure we setup the route
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function map(): \Symfony\Component\HttpFoundation\Request
    {
        // create symfony request object
        $symfonyRequest = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        // set routing
        $symfonyRequest->server->set('REQUEST_URI', $this->request->getUri()->getPath());

        return $symfonyRequest;
    }
}

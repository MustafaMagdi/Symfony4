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
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function map(): \Symfony\Component\HttpFoundation\Request
    {
        $method  = $this->request->getMethod();
        $headers = $this->request->getHeaders();
        $query   = $this->request->getQueryParams();
        $content = $this->request->getBody();
        $post    = [];

        // create symfony request object
        $symfonyRequest = new \Symfony\Component\HttpFoundation\Request(
            $query,
            $post,
            [], // attributes
            [], // cookies
            $this->request->getUploadedFiles(),
            [], // server
            $content
        );
        $symfonyRequest->setMethod($method);
        $symfonyRequest->headers->replace($headers);
        $symfonyRequest->server->set('REQUEST_URI', $this->request->getUri()->getPath());

        return $symfonyRequest;
    }
}

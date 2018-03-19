<?php

namespace App\Map;

use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequestMap
 *
 * @package App\Map
 */
class RequestMap
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
     * @return Request
     */
    public function map(): Request
    {
        $method  = $this->request->getMethod();
        $headers = $this->request->getHeaders();
        $query   = $this->request->getQueryParams();
        $content = $this->request->getBody();
        $post    = [];

        // create symfony request object
        $symfonyRequest = new Request(
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

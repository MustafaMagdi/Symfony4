<?php

namespace App\Map;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseMap
 *
 * @package App\Map
 */
class ResponseMap
{
    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
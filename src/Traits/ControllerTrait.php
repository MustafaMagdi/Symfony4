<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ControllerTrait
 *
 * @package App\Traits
 */
trait ControllerTrait
{
    /**
     * @param     $content
     * @param int $status
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respond($content, int $status = 200): Response
    {
        if ($this->isDebuggable()) {
            return $this->debug($content);
        }

        return $this->json($content, $status);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function success($content): Response
    {
        return $this->respond($content, 200);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function created($content): Response
    {
        return $this->respond($content, 201);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updated($content): Response
    {
        return $this->respond($content, 204);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleted($content): Response
    {
        return $this->respond($content, 202);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notModified($content): Response
    {
        return $this->respond($content, 304);
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function unProcessable($content): Response
    {
        return $this->respond($content, 422);
    }

    /**
     * check if we have _prof attribute sent on request
     *
     * @return bool
     */
    public function isDebuggable(): bool
    {
        $request = Request::createFromGlobals();
        if ($request->query->has('_profiler')) {
            return true;
        }

        return false;
    }

    /**
     * @param $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function debug($content): Response
    {
        return $this->render('debug.html.twig', [
            'content' => $content,
        ]);
    }
}

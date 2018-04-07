<?php

namespace App\Controller;

use App\Services\SeniorDeveloperDecorator;
use App\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    use ControllerTrait;

    /**
     * @var \App\Services\SeniorDeveloper
     */
    public $seniorDeveloper;

    /**
     * TestController constructor.
     *
     * @param \App\Services\SeniorDeveloper $seniorDeveloper
     */
    public function __construct(SeniorDeveloperDecorator $seniorDeveloper)
    {
        $this->seniorDeveloper = $seniorDeveloper;
    }

    /**
     * @Route("/test/years")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getYearsOfExperience(): Response
    {
        return $this->success($this->seniorDeveloper->minYearsOfExperience());
    }
}
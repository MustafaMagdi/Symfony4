<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
	/**
	 * @Route("/")
	 *
	 * @return Response
	 */
	public function index()
	{
		// @todo: we have to configure it to work based on a param is being sent with the request
		// on dev
		return $this->render('index/index.html.twig');

		// on prod
		// return $this->json(['data']);
	}
}

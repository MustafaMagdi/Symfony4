<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
	/**
	 * @Route("/")
	 *
	 * @return Response
	 */
	public function homepage()
	{
		return new Response('Welcome!');
	}

	/**
	 * @Route("/article/{slug}")
	 *
	 * @param $slug
	 *
	 * @return Response
	 */
	public function show($slug)
	{
		return new Response($slug);
	}
}

<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
	/**
	 * @Route("/")
	 *
	 * @return Response
	 */
	public function homepage()
	{
		return $this->render('base.html.twig');
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
		return $this->render('article/base.html.twig', [
			'slug' => $slug,
		]);
	}
}

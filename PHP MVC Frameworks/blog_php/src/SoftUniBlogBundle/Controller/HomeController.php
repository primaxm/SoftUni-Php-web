<?php

namespace SoftUniBlogBundle\Controller;

use SoftUniBlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    const LIMIT = 3;

    /**
     * @Route("/", name="blog_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $articles = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->findBy([], ['viewCount' => 'desc', 'dateAdded'=> 'desc']);

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $articles, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            self::LIMIT/*limit per page*/
        );

        return $this->render('home/index.html.twig',
            ['pagination' => $pagination]);
    }
}

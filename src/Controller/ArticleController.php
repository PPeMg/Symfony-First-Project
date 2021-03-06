<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class ArticleController extends AbstractController
{
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    public function show($slug)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }
              
    public function toggleArticleHeart(Request $request, LoggerInterface $logger)
    {
        $likes = $request->request->get('likes');

        if(trim($request->request->get('operation')) == "add"){
            $likes++;
        } else {
            $likes--;
        }

        // TODO - actually heart/unheart the article!
        $logger->info('Article is being hearted!');

        return new JsonResponse(['hearts' => $likes]);
    }
}

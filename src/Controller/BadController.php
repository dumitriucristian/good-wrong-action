<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BadController extends AbstractController
{
    /**
     * @Route("/bad", name="bad")
     */
    public function index()
    {
        return $this->render('bad/index.html.twig', [
            'controller_name' => 'BadController',
        ]);
    }
}

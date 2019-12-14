<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Good;

class GoodController extends AbstractController
{
    /**
     * @Route("/good", name="good")
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Good::class);
        $good = $repository->findAll();
        return $this->render('good/index.html.twig', [
            'goods' => $good,
        ]);
    }
}

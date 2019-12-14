<?php

namespace App\Controller;

use App\Entity\Feedback;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FeedbackController extends AbstractController
{
    /**
     * @Route("/", name="feedback")
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Feedback::class);
        $feedback = $repository->findAll();
        return $this->render('feedback/index.html.twig', [
            'feedbacks' => $feedback,
        ]);
    }

 }
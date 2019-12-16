<?php

namespace App\Controller;

use App\Service\GoodHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Good;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class GoodController extends AbstractController
{
    /**
     * @Route("/good", name="good-list")
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Good::class);
        $goodies = $repository->findAll();
        return $this->render('good/index.html.twig', [
            'goodies' => $goodies,
        ]);
    }

    /**
     * @Route("/good/{id}", name="good")
     */
    public function details(EntityManagerInterface $em, $id, Request $request, GoodHelper $goodHelper)
    {
        $repository = $em->getRepository(Good::class);
        $good = $repository->findOneBy(['id'=> $id ]);
        dump($goodHelper->test());
        $form = $this->createFormBuilder($good)
            ->add('item', TextType::class)
            ->add('edit', SubmitType::class, [
                'label' => 'Edit'
            ])
            ->add('remove', SubmitType::class, [
                'label' => 'Remove'
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->get('edit')->isClicked()) {
            $good->update($request);
            $this->addFlash('success', 'Form has been updated');
        }


        if ($form->get('remove')->isClicked()) {

            $data = $request->request->get('form');
            $em->remove($good);
            $em->flush();
            $this->addFlash('success', 'Your entity has been deleted');
        }

        return $this->render('good/details.html.twig', [
            'good' => $good,
            'form' => $form->createView()
        ]);
    }



}

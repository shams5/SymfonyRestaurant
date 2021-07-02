<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        // Nous récuperons l'Entity Managr afin de pouvoir diallogeur avec notre base de donées
        // Nous récuperons égalemnet le Repository de Plat pour récuperer des éléments de cette table
        $entityManager = $this->getDoctrine()->getManager();
        $platRepository = $entityManager->getRepository(\App\Entity\Plat::class);
        // Nous récuperons la liste des Catégories
        $categoryRepository = $entityManager->getRepository(\App\Entity\Category::class);
        $categories = $categoryRepository->findAll();
        // Nous récuperons tous les Plats
        $plats = $platRepository->findAll();
        // Nous mélangeons l'ordre des plats pour notre page d'accuiel en mélangeant les clefs du tableau reçu 
        shuffle($plats);
        // Nous ne recupérons que les huit prmèires entrées du tableua tout juste mélangé
        $slicedPlats = array_slice($plats, 0, 8);
        // Nous transmettons les différentes variables à notre vue Twig
        return $this->render('index/index.html.twig', [
            'categories' => $categories,
            'plats' => $slicedPlats,
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

     /**
     * @Route("/produit/{platId}", name="produit_display")
     */
    public function produitDisplay(Request $request, $platId = false){
        //Cette fonction présente le produit (c'est-à-dire le plat) identifié par son ID dans l'URL
        //Pour dialoguer avec la base de données et récupérer les informations sur le plat, nous allons récupérer l'Entity Manager et le Repository concerné
        $entityManager = $this->getDoctrine()->getManager();
        $platRepository = $entityManager->getRepository(\App\Entity\Plat::class);
        //Nous récupérons la liste des Catégories
        $categoryRepository = $entityManager->getRepository(\App\Entity\Category::class);
        $categories = $categoryRepository->findAll();
        //Nous récupérons le Plat dont l'ID est indiqué dans l'URL
        //Nous faisons appel à la fonction find() laquelle récupère l'instance d'Entity dont l'ID correspond à celui de la table SQL auquel notre Repository est lié
        $plat = $platRepository->find($platId);
        //Si aucun plat n'est trouvé, nous retournons vers l'index
        if(!$plat){
            return $this->redirect($this->generateUrl('index'));
        }
        //Si nous avons trouvé un plat, nous le renvoyons vers la page Twig chargée d'afficher un résultat individuel
        return $this->render('index/fiche-produit.html.twig', [
            'categories' => $categories,
            'plat' => $plat,
        ]);
    }

    /**
     * @Route("/gestion/plat/create", name="plat_create")
     */
    public function createPlat(Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $plat = new \App\Entity\Plat;
        $platForm = $this->createForm(\App\PlatType::class, $plat);
        // 
        $platForm->handleRequest($request);
        // 
        if($request->isMethod('post') && $platForm->isValid()){
            // 
            $entityManager->persist($plat);
            // 
            $entityManager->flush();
            // 
            return $this->redirect($this->generateUrl('index'));
        }
        // 
        return $this->render('index/dataform.html.twig', [
            'categories' => $categories,
            'formName' => 'Création de Plat',
            'dataForm' => $platForm->createView(),
        ]);
    }
}

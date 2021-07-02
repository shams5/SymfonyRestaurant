<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Nous allons créer un tableau qui contiendera toutes les informations pour nos diff"rentes instances d'Eintity
        // C'est un tableau de tableau associatifs dont chaque clef correspond à un attribut de notre Entity
        $dataPlats = [
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Taccoux série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Pates série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Curry série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Curry série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Pizza série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Pates série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Pates série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Pizza série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Curry série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Burger série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
            ['name' => 'Curry série #' . rand(50, 600), 'description' => 'Description du plat', 'price' => 0.99,],
        ];
     
        // Nous utilisons une boucle foreach pour iterer à l'intérieur de notre tableau $dataPlats
        foreach($dataPlats as $dataPlat){

            //   Création de notre première instance d'Entity Plat
            $plat = new \App\Entity\Plat;
            $plat->setName($dataPlat['name']);
            $plat->setDescription($dataPlat['description']);
            $plat->setPrice($dataPlat['price'] + rand(5, 25));
            // Demande de persistance (cad enregistrement dans la base de données, faisant ainsi PERSISTER notre instance d'Entity au-delà de la session utilisateur)
            $manager->persist($plat);
        }
    // Exécution des requetes déposées
    $manager->flush();
    }
}
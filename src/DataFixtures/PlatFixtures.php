<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    //   Création de notre première instance d'Entity Plat
    $plat = new \App\Entity\Plat;
    $plat->setName('Pizza');
    $plat->setDescription('Ceci est une Pizza');
    $plat->setPrice(19.99);
    // Demande de persistance (cad enregistrement dans la base de données, faisant ainsi PERSISTER notre instance d'Entity au-delà de la session utilisateur)
    $manager->persist($plat);
    // Exécution des requetes déposées
    $manager->flush();
    }
}
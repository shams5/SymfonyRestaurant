<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dataCategories = [
            ['name' => 'Burger', 'description' => 'Hamburger, a burger consisting of beef meat one or more cooked patties of it, placed inside a sliced bread roll or bun. Hamburger, a burger consisting of beef meat one or more cooked patties of it, placed inside a sliced bread roll or bun. Hamburger, a burger consisting of beef meat one or more cooked patties of it, placed inside a sliced bread roll or bun.'],
            ['name' => 'Pates', 'description' => 'Pastas are divided into two broad categories: dried (pasta secca) and fresh (pasta fresca). Most dried pasta is produced commercially via an extrusion process, although it can be produced at home. Fresh pasta is traditionally produced by hand, sometimes with the aid of simple machines.[3] Fresh pastas available in grocery stores are produced commercially by large-scale machines.'],
            ['name' => 'Pizza', 'description' => 'The term pizza was first recorded in the 10th century in a Latin manuscript from the Southern Italian town of Gaeta in Lazio, on the border with Campania.[4] Modern pizza was invented in Naples, and the dish and its variants have since become popular in many countries.[5] It has become one of the most popular foods in the world and a common fast food item in Europe and North America, available at pizzerias (restaurants specializing in pizza), restaurants offering Mediterranean cuisine, and via pizza delivery.[5][6] Many companies sell ready-baked frozen pizzas to be reheated in an ordinary home oven.'],
            ['name' => 'Curry', 'description' => 'There are many varieties of dishes called "curries". For example, in original traditional cuisines, the precise selection of spices for each dish is a matter of national or regional cultural tradition, religious practice, and, to some extent, family preference. Such dishes are called by specific names that refer to their ingredients, spicing, and cooking methods. [4] Curry powder, a commercially prepared mixture of spices marketed in the West, was first exported to Britain in the 18th Century when Indian merchants sold a concoction of spices, similar to garam masala, to the British colonial government and army returning to Britain.'],
        ];
        // 
        foreach($dataCategories as $dataCategory){
            $category = new \App\Entity\Category;
            $category->setName($dataCategory['name']);
            $category->setDescription($dataCategory['description']);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
<?php

namespace App\DataFixtures;

use App\Entity\DinigTable;
use App\Factory\CategoryFactory;
use App\Factory\DinigTableFactory;
use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Crear 5 categorías
        CategoryFactory::createMany(5);

        // Crear 20 productos con categorías e ingredientes aleatorios
        ProductFactory::createMany(60, function () {
            return [
                'category' => CategoryFactory::random(),
            ];
        });

        DinigTableFactory::createMany(12);
    }
}

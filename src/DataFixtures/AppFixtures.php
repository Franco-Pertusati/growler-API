<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\IngredientFactory;
use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Crear 10 ingredientes primero
        IngredientFactory::createMany(10);

        // Crear 5 categorías
        CategoryFactory::createMany(5);

        // Crear 20 productos con categorías e ingredientes aleatorios
        ProductFactory::createMany(30, function () {
            return [
                'ingredients' => IngredientFactory::randomRange(2, 5),
                'category' => CategoryFactory::random(),
            ];
        });
    }
}

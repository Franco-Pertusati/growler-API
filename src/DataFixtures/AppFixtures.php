<?php

namespace App\DataFixtures;

use App\Entity\DinigTable;
use App\Factory\CategoryFactory;
use App\Factory\DinigTableFactory;
use App\Factory\ProductFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategoryFactory::createMany(5);

        ProductFactory::createMany(60, function () {
            return [
                'category' => CategoryFactory::random(),
            ];
        });

        DinigTableFactory::createMany(12);
        UserFactory::createMany(22);
    }
}

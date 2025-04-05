<?php

namespace App\Factory;

use App\Entity\DiningTable;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<DiningTable>
 */
final class DiningTableFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return DiningTable::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
return [
            'name' => self::faker()->word(),
            'position' => self::faker()->unique()->numberBetween(1, 40),
            'state' => self::faker()->numberBetween(1, 3),
            'isRound' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(DiningTable $diningTable): void {})
        ;
    }
}

<?php

namespace App\Factory;

use App\Entity\Product;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Product>
 */
final class ProductFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct() {}

    public static function class(): string
    {
        return Product::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->randomElement([
                'Mojito',
                'Margarita',
                'Old Fashioned',
                'Martini',
                'Cosmopolitan',
                'Whiskey Sour',
                'Mai Tai',
                'Bloody Mary',
                'Piña Colada',
                'Negroni',
                'Daiquiri',
                'Long Island Iced Tea',
                'Tequila Sunrise',
                'Gin and Tonic',
                'Manhattan',
                'Caipirinha',
                'Tom Collins',
                'Rum Punch',
                'Irish Coffee',
                'Espresso Martini'
            ]),
            'price' => self::faker()->randomFloat(2, 5, 20), // tragos suelen tener precios más altos
            'category' => CategoryFactory::new(),
        ];
    }
    

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Product $product): void {})
        ;
    }
}

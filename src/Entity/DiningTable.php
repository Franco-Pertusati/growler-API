<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\DiningTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiningTableRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            inputFormats: ['json' => ['application/ld+json', 'application/json']], // Acepta ambos formatos
            outputFormats: ['json' => ['application/ld+json']]
        ),
        new Put(),
        new Patch(
            inputFormats: ['json' => ['application/ld+json', 'application/json']], // Acepta ambos formatos
            outputFormats: ['json' => ['application/ld+json']]
        ),
        new Delete()
    ]
)]
class DiningTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class)]
    private Collection $products;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(nullable: true)]
    private ?int $guestCount = null;

    #[ORM\Column]
    private ?int $state = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $note = null;

    #[ORM\Column]
    private ?bool $isRound = null;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        $this->products->removeElement($product);

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getGuestCount(): ?int
    {
        return $this->guestCount;
    }

    public function setGuestCount(?int $guestCount): static
    {
        $this->guestCount = $guestCount;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isRound(): ?bool
    {
        return $this->isRound;
    }

    public function setIsRound(bool $isRound): static
    {
        $this->isRound = $isRound;

        return $this;
    }
}

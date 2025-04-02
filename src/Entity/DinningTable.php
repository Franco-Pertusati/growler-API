<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DinningTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DinningTableRepository::class)]
#[ApiResource]
class DinningTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class)]
    private Collection $products;

    #[ORM\Column]
    private ?float $total = null;

    #[ORM\Column]
    private ?bool $reserved = null;

    #[ORM\Column]
    private ?int $postion = null;

    #[ORM\Column]
    private ?int $guestCount = null;

    #[ORM\Column(length: 34)]
    private ?string $state = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $note = null;
    
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

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function isReserved(): ?bool
    {
        return $this->reserved;
    }

    public function setReserved(bool $reserved): static
    {
        $this->reserved = $reserved;

        return $this;
    }

    public function getPostion(): ?int
    {
        return $this->postion;
    }

    public function setPostion(int $postion): static
    {
        $this->postion = $postion;

        return $this;
    }

    public function getGuestCount(): ?int
    {
        return $this->guestCount;
    }

    public function setGuestCount(int $guestCount): static
    {
        $this->guestCount = $guestCount;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
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
}

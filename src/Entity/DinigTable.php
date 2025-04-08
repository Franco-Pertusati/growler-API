<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\DinigTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DinigTableRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            inputFormats: ['json' => ['application/ld+json', 'application/json']], // Acepta ambos formatos
            outputFormats: ['json' => ['application/ld+json']]
        ),
        new Put(
            inputFormats: ['json' => ['application/ld+json', 'application/json']], // Acepta ambos formatos
            outputFormats: ['json' => ['application/ld+json']]
        ),
        new Patch(
            inputFormats: ['json' => ['application/ld+json', 'application/json']], // Acepta ambos formatos
            outputFormats: ['json' => ['application/ld+json']]
        ),
        new Delete()
    ]
)]
class DinigTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column]
    private ?int $state = null;

    #[ORM\Column]
    private ?bool $round = null;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getState(): ? int
    {
        return $this->state;
    }

    public function setState(int $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function isRound(): ?bool
    {
        return $this->round;
    }

    public function setRound(bool $round): static
    {
        $this->round = $round;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\InteresserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InteresserRepository::class)]
class Interesser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $place = null;

    #[ORM\ManyToOne(inversedBy: 'interesser')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'interesser')]
    private ?Concert $concert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPlace(): ?bool
    {
        return $this->place;
    }

    public function setPlace(bool $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getConcert(): ?Concert
    {
        return $this->concert;
    }

    public function setConcert(?Concert $concert): static
    {
        $this->concert = $concert;

        return $this;
    }
}

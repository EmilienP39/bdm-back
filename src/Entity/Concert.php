<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $groupe = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $demo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $Lieu = null;

    #[ORM\Column(length: 255)]
    private ?string $liens = null;

    #[ORM\OneToMany(mappedBy: 'concert', targetEntity: Interesser::class)]
    private Collection $interesser;

    public function __construct()
    {
        $this->interesser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDemo(): ?string
    {
        return $this->demo;
    }

    public function setDemo(string $demo): static
    {
        $this->demo = $demo;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): static
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getLiens(): ?string
    {
        return $this->liens;
    }

    public function setLiens(string $liens): static
    {
        $this->liens = $liens;

        return $this;
    }

    /**
     * @return Collection<int, interesser>
     */
    public function getInteresser(): Collection
    {
        return $this->interesser;
    }

    public function addInteresser(interesser $interesser): static
    {
        if (!$this->interesser->contains($interesser)) {
            $this->interesser->add($interesser);
            $interesser->setConcert($this);
        }

        return $this;
    }

    public function removeInteresser(interesser $interesser): static
    {
        if ($this->interesser->removeElement($interesser)) {
            // set the owning side to null (unless already changed)
            if ($interesser->getConcert() === $this) {
                $interesser->setConcert(null);
            }
        }

        return $this;
    }


}

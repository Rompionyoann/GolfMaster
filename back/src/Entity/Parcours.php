<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcoursRepository::class)]
#[ApiResource]
class Parcours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NbTrou = null;

    #[ORM\Column]
    private ?int $Distance = null;

    #[ORM\Column(length: 255)]
    private ?string $Image = null;

    #[ORM\Column(length: 255)]
    private ?string $Trou = null;

    #[ORM\OneToMany(mappedBy: 'parcours', targetEntity: Trou::class, orphanRemoval: true)]
    private Collection $trous;

    #[ORM\OneToMany(mappedBy: 'Parcours', targetEntity: Round::class, orphanRemoval: true)]
    private Collection $rounds;

    public function __construct()
    {
        $this->trous = new ArrayCollection();
        $this->rounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTrou(): ?int
    {
        return $this->NbTrou;
    }

    public function setNbTrou(int $NbTrou): static
    {
        $this->NbTrou = $NbTrou;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->Distance;
    }

    public function setDistance(int $Distance): static
    {
        $this->Distance = $Distance;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getTrou(): ?string
    {
        return $this->Trou;
    }

    public function setTrou(string $Trou): static
    {
        $this->Trou = $Trou;

        return $this;
    }

    /**
     * @return Collection<int, Trou>
     */
    public function getTrous(): Collection
    {
        return $this->trous;
    }

    public function addTrou(Trou $trou): static
    {
        if (!$this->trous->contains($trou)) {
            $this->trous->add($trou);
            $trou->setParcours($this);
        }

        return $this;
    }

    public function removeTrou(Trou $trou): static
    {
        if ($this->trous->removeElement($trou)) {
            // set the owning side to null (unless already changed)
            if ($trou->getParcours() === $this) {
                $trou->setParcours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Round>
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(Round $round): static
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);
            $round->setParcours($this);
        }

        return $this;
    }

    public function removeRound(Round $round): static
    {
        if ($this->rounds->removeElement($round)) {
            // set the owning side to null (unless already changed)
            if ($round->getParcours() === $this) {
                $round->setParcours(null);
            }
        }

        return $this;
    }
}

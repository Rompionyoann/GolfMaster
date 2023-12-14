<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TrouRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrouRepository::class)]
#[ApiResource]
class Trou
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Distance = null;

    #[ORM\Column(length: 255)]
    private ?string $Image = null;

    #[ORM\Column]
    private ?int $Par = null;

    #[ORM\ManyToOne(inversedBy: 'trous')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parcours $parcours = null;

    #[ORM\OneToMany(mappedBy: 'Trou', targetEntity: Counting::class, orphanRemoval: true)]
    private Collection $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPar(): ?int
    {
        return $this->Par;
    }

    public function setPar(int $Par): static
    {
        $this->Par = $Par;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(?Parcours $parcours): static
    {
        $this->parcours = $parcours;

        return $this;
    }

    /**
     * @return Collection<int, Counting>
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Counting $ye): static
    {
        if (!$this->yes->contains($ye)) {
            $this->yes->add($ye);
            $ye->setTrou($this);
        }

        return $this;
    }

    public function removeYe(Counting $ye): static
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getTrou() === $this) {
                $ye->setTrou(null);
            }
        }

        return $this;
    }
}

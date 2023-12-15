<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundRepository::class)]
#[ApiResource]
class Round
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ShotsTotal = null;

    #[ORM\ManyToOne(inversedBy: 'rounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parcours $Parcours = null;

    #[ORM\ManyToOne(inversedBy: 'rounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    #[ORM\OneToMany(mappedBy: 'Round', targetEntity: Counting::class, orphanRemoval: true)]
    private Collection $countings;

    public function __construct()
    {
        $this->countings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShotsTotal(): ?int
    {
        return $this->ShotsTotal;
    }

    public function setShotsTotal(int $ShotsTotal): static
    {
        $this->ShotsTotal = $ShotsTotal;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->Parcours;
    }

    public function setParcours(?Parcours $Parcours): static
    {
        $this->Parcours = $Parcours;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setuser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Counting>
     */
    public function getCountings(): Collection
    {
        return $this->countings;
    }

    public function addCounting(Counting $counting): static
    {
        if (!$this->countings->contains($counting)) {
            $this->countings->add($counting);
            $counting->setRound($this);
        }

        return $this;
    }

    public function removeCounting(Counting $counting): static
    {
        if ($this->countings->removeElement($counting)) {
            // set the owning side to null (unless already changed)
            if ($counting->getRound() === $this) {
                $counting->setRound(null);
            }
        }

        return $this;
    }
}

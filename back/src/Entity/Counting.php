<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CountingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountingRepository::class)]
#[ApiResource]
class Counting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Shots = null;

    #[ORM\ManyToOne(inversedBy: 'yes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trou $Trou = null;

    #[ORM\ManyToOne(inversedBy: 'countings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Round $Round = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShots(): ?int
    {
        return $this->Shots;
    }

    public function setShots(int $Shots): static
    {
        $this->Shots = $Shots;

        return $this;
    }

    public function getTrou(): ?Trou
    {
        return $this->Trou;
    }

    public function setTrou(?Trou $Trou): static
    {
        $this->Trou = $Trou;

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->Round;
    }

    public function setRound(?Round $Round): static
    {
        $this->Round = $Round;

        return $this;
    }
}

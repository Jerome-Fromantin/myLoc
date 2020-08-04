<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\ORM\Mapping as ORM;
/*use Symfony\Component\Validator\Constraints as Assert;*/

/**
 * @ORM\Entity(repositoryClass=PretRepository::class)
 */
class Pret
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="prets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emprunteur;

    /**
     * @ORM\ManyToOne(targetEntity=Biens::class, inversedBy="prets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getEmprunteur(): ?User
    {
        return $this->emprunteur;
    }

    public function setEmprunteur(?User $emprunteur): self
    {
        $this->emprunteur = $emprunteur;

        return $this;
    }

    public function getBien(): ?Biens
    {
        return $this->bien;
    }

    public function setBien(?Biens $bien): self
    {
        $this->bien = $bien;

        return $this;
    }

    public function __toString()
    {
        return $this->date_debut;
    }
}

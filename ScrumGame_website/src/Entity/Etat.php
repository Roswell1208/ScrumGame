<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtatRepository::class)
 */
class Etat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEtat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionEtat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtat(): ?string
    {
        return $this->nomEtat;
    }

    public function setNomEtat(string $nomEtat): self
    {
        $this->nomEtat = $nomEtat;

        return $this;
    }

    public function getDescriptionEtat(): ?string
    {
        return $this->descriptionEtat;
    }

    public function setDescriptionEtat(string $descriptionEtat): self
    {
        $this->descriptionEtat = $descriptionEtat;

        return $this;
    }

    public function __toString() // Permet d'afficher le nom du jeu dans le formulaire d'ajout d'un jeu (permet de retourner une chaine de caractère)
                                   // au lieu d'un id
    {
        return $this->nomEtat;
    }

}

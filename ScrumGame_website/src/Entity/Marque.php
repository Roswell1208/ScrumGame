<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
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
    private $nomMarque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoMarque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?string
    {
        return $this->nomMarque;
    }

    public function setNomMarque(string $nomMarque): self
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    public function getPhotoMarque(): ?string
    {
        return $this->photoMarque;
    }

    public function setPhotoMarque(string $photoMarque): self
    {
        $this->photoMarque = $photoMarque;

        return $this;
    }

    public function __toString() // Permet d'afficher le nom de la marque dans le formulaire
    {
        return $this->nomMarque;
    }
}

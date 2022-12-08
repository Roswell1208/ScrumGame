<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsoleRepository::class)
 */
class Console
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
    private $nomConsole;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoConsole;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idMarque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomConsole(): ?string
    {
        return $this->nomConsole;
    }

    public function setNomConsole(string $nomConsole): self
    {
        $this->nomConsole = $nomConsole;

        return $this;
    }

    public function getPhotoConsole(): ?string
    {
        return $this->photoConsole;
    }

    public function setPhotoConsole(string $photoConsole): self
    {
        $this->photoConsole = $photoConsole;

        return $this;
    }

    public function getIdMarque(): ?Marque
    {
        return $this->idMarque;
    }

    public function setIdMarque(?Marque $idMarque): self
    {
        $this->idMarque = $idMarque;

        return $this;
    }
}

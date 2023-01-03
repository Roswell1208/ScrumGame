<?php

namespace App\Entity;

use App\Repository\JeuxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JeuxRepository::class)
 */
class Jeux
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
    private $nomJeu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoJeu;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEtat;

    /**
     * @ORM\ManyToOne(targetEntity=Console::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idConsole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJeu(): ?string
    {
        return $this->nomJeu;
    }

    public function setNomJeu(string $nomJeu): self
    {
        $this->nomJeu = $nomJeu;

        return $this;
    }

    public function getPhotoJeu(): ?string
    {
        return $this->photoJeu;
    }

    public function setPhotoJeu(string $photoJeu): self
    {
        $this->photoJeu = $photoJeu;

        return $this;
    }

    public function getIdEtat(): ?Etat
    {
        return $this->idEtat;
    }

    public function setIdEtat(?Etat $idEtat): self
    {
        $this->idEtat = $idEtat;

        return $this;
    }

    public function getIdConsole(): ?Console
    {
        return $this->idConsole;
    }

    public function setIdConsole(?Console $idConsole): self
    {
        $this->idConsole = $idConsole;

        return $this;
    }
}

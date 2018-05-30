<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GruppoRepository")
 */
class Gruppo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utente", mappedBy="Gruppo")
     */
    private $utenti;

    public function __construct()
    {
        $this->utenti = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return Collection|Utente[]
     */
    public function getUtenti(): Collection
    {
        return $this->utenti;
    }

    public function addUtenti(Utente $utenti): self
    {
        if (!$this->utenti->contains($utenti)) {
            $this->utenti[] = $utenti;
            $utenti->setGruppo($this);
        }

        return $this;
    }

    public function removeUtenti(Utente $utenti): self
    {
        if ($this->utenti->contains($utenti)) {
            $this->utenti->removeElement($utenti);
            // set the owning side to null (unless already changed)
            if ($utenti->getGruppo() === $this) {
                $utenti->setGruppo(null);
            }
        }

        return $this;
    }
}

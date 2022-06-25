<?php

namespace App\Entity;

use App\Repository\WerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WerRepository::class)
 */
class Wer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Userread::class, inversedBy="namebook")
     */
    private $fiobook;

    /**
     * @ORM\ManyToMany(targetEntity=Books::class, inversedBy="wers")
     */
    private $namebookuse;

    public function __construct()
    {
        $this->fiobook = new ArrayCollection();
        $this->namebookuse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Userread>
     */
    public function getFiobook(): Collection
    {
        return $this->fiobook;
    }

    public function addFiobook(Userread $fiobook): self
    {
        if (!$this->fiobook->contains($fiobook)) {
            $this->fiobook[] = $fiobook;
        }

        return $this;
    }

    public function removeFiobook(Userread $fiobook): self
    {
        $this->fiobook->removeElement($fiobook);

        return $this;
    }

    /**
     * @return Collection<int, Books>
     */
    public function getNamebookuse(): Collection
    {
        return $this->namebookuse;
    }

    public function addNamebookuse(Books $namebookuse): self
    {
        if (!$this->namebookuse->contains($namebookuse)) {
            $this->namebookuse[] = $namebookuse;
        }

        return $this;
    }

    public function removeNamebookuse(Books $namebookuse): self
    {
        $this->namebookuse->removeElement($namebookuse);

        return $this;
    }
}

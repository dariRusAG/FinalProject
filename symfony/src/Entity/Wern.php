<?php

namespace App\Entity;

use App\Repository\WernRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WernRepository::class)
 */
class Wern
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Userread::class, inversedBy="werns")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameuse;

    /**
     * @ORM\ManyToMany(targetEntity=Books::class, inversedBy="werns")
     */
    private $namebook;

    public function __construct()
    {
        $this->namebook = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameuse(): ?Userread
    {
        return $this->nameuse;
    }

    public function setNameuse(?Userread $nameuse): self
    {
        $this->nameuse = $nameuse;

        return $this;
    }

    /**
     * @return Collection<int, Books>
     */
    public function getNamebook(): Collection
    {
        return $this->namebook;
    }

    public function addNamebook(Books $namebook): self
    {
        if (!$this->namebook->contains($namebook)) {
            $this->namebook[] = $namebook;
        }

        return $this;
    }

    public function removeNamebook(Books $namebook): self
    {
        $this->namebook->removeElement($namebook);

        return $this;
    }
}

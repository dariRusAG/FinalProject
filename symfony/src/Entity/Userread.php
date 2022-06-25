<?php

namespace App\Entity;

use App\Repository\UserreadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserreadRepository::class)
 */
class Userread
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
    private $family;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Wern::class, mappedBy="nameuse")
     */
    private $werns;

    public function __construct()
    {
        $this->werns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function __toString()
    {
        return strval($this->getFamily() . ' ' . $this->getName());
    }

    /**
     * @return Collection<int, Wern>
     */
    public function getWerns(): Collection
    {
        return $this->werns;
    }

    public function addWern(Wern $wern): self
    {
        if (!$this->werns->contains($wern)) {
            $this->werns[] = $wern;
            $wern->setNameuse($this);
        }

        return $this;
    }

    public function removeWern(Wern $wern): self
    {
        if ($this->werns->removeElement($wern)) {
            // set the owning side to null (unless already changed)
            if ($wern->getNameuse() === $this) {
                $wern->setNameuse(null);
            }
        }

        return $this;
    }
}

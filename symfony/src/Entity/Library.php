<?php

namespace App\Entity;

use App\Repository\LibraryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibraryRepository::class)
 */
class Library
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
    private $nameLibrary;

    /**
     * @ORM\OneToMany(targetEntity=Catalog::class, mappedBy="nameLibr")
     */
    private $catalogs;

    public function __construct()
    {
        $this->catalogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLibrary(): ?string
    {
        return $this->nameLibrary;
    }

    public function setNameLibrary(string $nameLibrary): self
    {
        $this->nameLibrary = $nameLibrary;

        return $this;
    }

    /**
     * @return Collection<int, Catalog>
     */
    public function getCatalogs(): Collection
    {
        return $this->catalogs;
    }

    public function addCatalog(Catalog $catalog): self
    {
        if (!$this->catalogs->contains($catalog)) {
            $this->catalogs[] = $catalog;
            $catalog->setNameLibr($this);
        }

        return $this;
    }

    public function removeCatalog(Catalog $catalog): self
    {
        if ($this->catalogs->removeElement($catalog)) {
            // set the owning side to null (unless already changed)
            if ($catalog->getNameLibr() === $this) {
                $catalog->setNameLibr(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return strval( $this->getNameLibrary() );
    }
}

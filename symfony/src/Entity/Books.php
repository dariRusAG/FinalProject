<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
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
    private $genreBook;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameBook;

    /**
     * @ORM\OneToMany(targetEntity=Catalog::class, mappedBy="genreLibr")
     */
    private $catalogs;

    /**
     * @ORM\ManyToMany(targetEntity=Wer::class, mappedBy="namebookuse")
     */
    private $wers;

    /**
     * @ORM\ManyToMany(targetEntity=Wern::class, mappedBy="namebook")
     */
    private $werns;

    public function __construct()
    {
        $this->catalogs = new ArrayCollection();
        $this->wers = new ArrayCollection();
        $this->werns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenreBook(): ?string
    {
        return $this->genreBook;
    }

    public function setGenreBook(string $genreBook): self
    {
        $this->genreBook = $genreBook;

        return $this;
    }

    public function getNameBook(): ?string
    {
        return $this->nameBook;
    }

    public function setNameBook(string $nameBook): self
    {
        $this->nameBook = $nameBook;

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
            $catalog->setGenreLibr($this);
        }

        return $this;
    }

    public function removeCatalog(Catalog $catalog): self
    {
        if ($this->catalogs->removeElement($catalog)) {
            // set the owning side to null (unless already changed)
            if ($catalog->getGenreLibr() === $this) {
                $catalog->setGenreLibr(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Wer>
     */
    public function getWers(): Collection
    {
        return $this->wers;
    }

    public function addWer(Wer $wer): self
    {
        if (!$this->wers->contains($wer)) {
            $this->wers[] = $wer;
            $wer->addNamebookuse($this);
        }

        return $this;
    }

    public function removeWer(Wer $wer): self
    {
        if ($this->wers->removeElement($wer)) {
            $wer->removeNamebookuse($this);
        }

        return $this;
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
            $wern->addNamebook($this);
        }

        return $this;
    }

    public function removeWern(Wern $wern): self
    {
        if ($this->werns->removeElement($wern)) {
            $wern->removeNamebook($this);
        }

        return $this;
    }

    public function __toString()
    {
        //return strval($this->getGenreBook());
        return strval($this->getNameBook());
    }
}

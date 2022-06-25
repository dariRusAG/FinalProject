<?php

namespace App\Entity;

use App\Repository\CatalogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CatalogRepository::class)
 */
class Catalog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Library::class, inversedBy="catalogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameLibr;

    /**
     * @ORM\ManyToOne(targetEntity=Books::class, inversedBy="catalogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genreLibr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLibr(): ?Library
    {
        return $this->nameLibr;
    }

    public function setNameLibr(?Library $nameLibr): self
    {
        $this->nameLibr = $nameLibr;

        return $this;
    }

    public function getGenreLibr(): ?Books
    {
        return $this->genreLibr;
    }

    public function setGenreLibr(?Books $genreLibr): self
    {
        $this->genreLibr = $genreLibr;

        return $this;
    }
}

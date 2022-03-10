<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="idr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idr;

    /**
     * @var string
     *
     * @ORM\Column(name="nomr", type="string", length=255, nullable=false)
     */
    private $nomr;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionr", type="string", length=255, nullable=false)
     */
    private $descriptionr;

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristique", type="string", length=255, nullable=false)
     */
    private $caracteristique;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="gouvernorat", type="string", length=255, nullable=false)
     */
    private $gouvernorat;

    public function getIdr(): ?int
    {
        return $this->idr;
    }

    public function getNomr(): ?string
    {
        return $this->nomr;
    }

    public function setNomr(string $nomr): self
    {
        $this->nomr = $nomr;

        return $this;
    }

    public function getDescriptionr(): ?string
    {
        return $this->descriptionr;
    }

    public function setDescriptionr(string $descriptionr): self
    {
        $this->descriptionr = $descriptionr;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(string $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getGouvernorat(): ?string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(string $gouvernorat): self
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }


}

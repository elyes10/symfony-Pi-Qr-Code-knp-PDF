<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centrecamping
 *
 * @ORM\Table(name="centrecamping", indexes={@ORM\Index(name="fk2", columns={"idr"})})
 * @ORM\Entity
 */
class Centrecamping
{
    /**
     * @var int
     *
     * @ORM\Column(name="idc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var string
     *
     * @ORM\Column(name="nomc", type="string", length=255, nullable=false)
     */
    private $nomc;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionc", type="string", length=255, nullable=false)
     */
    private $descriptionc;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="typec", type="string", length=255, nullable=false)
     */
    private $typec;

    /**
     * @var string
     *
     * @ORM\Column(name="imgCentre", type="string", length=255, nullable=false)
     */
    private $imgcentre;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idr", referencedColumnName="idr")
     * })
     */
    private $idr;

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function getNomc(): ?string
    {
        return $this->nomc;
    }

    public function setNomc(string $nomc): self
    {
        $this->nomc = $nomc;

        return $this;
    }

    public function getDescriptionc(): ?string
    {
        return $this->descriptionc;
    }

    public function setDescriptionc(string $descriptionc): self
    {
        $this->descriptionc = $descriptionc;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypec(): ?string
    {
        return $this->typec;
    }

    public function setTypec(string $typec): self
    {
        $this->typec = $typec;

        return $this;
    }

    public function getImgcentre(): ?string
    {
        return $this->imgcentre;
    }

    public function setImgcentre(string $imgcentre): self
    {
        $this->imgcentre = $imgcentre;

        return $this;
    }

    public function getIdr(): ?Region
    {
        return $this->idr;
    }

    public function setIdr(?Region $idr): self
    {
        $this->idr = $idr;

        return $this;
    }


}

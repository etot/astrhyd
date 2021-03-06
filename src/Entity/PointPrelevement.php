<?php

namespace App\Entity;

use App\Repository\PointPrelevementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointPrelevementRepository::class)
 */
class PointPrelevement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_base;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $support;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coord_x_l93;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coord_y_l93;

    /**
     * @ORM\ManyToOne(targetEntity=Station::class, inversedBy="pointPrelevements")
     */
    private $station;

    /**
     * @ORM\OneToMany(targetEntity=OperationPrelevement::class, mappedBy="pointPrelevement", cascade={"persist"})
     */
    private $operationPrelevements;

    public function __construct()
    {
        $this->operationPrelevements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBase(): ?string
    {
        return $this->num_base;
    }

    public function setNumBase(?string $num_base): self
    {
        $this->num_base = $num_base;

        return $this;
    }

    public function getSupport(): ?string
    {
        return $this->support;
    }

    public function setSupport(?string $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getCoordXL93(): ?float
    {
        return $this->coord_x_l93;
    }

    public function setCoordXL93(?float $coord_x_l93): self
    {
        $this->coord_x_l93 = $coord_x_l93;

        return $this;
    }

    public function getCoordYL93(): ?float
    {
        return $this->coord_y_l93;
    }

    public function setCoordYL93(?float $coord_y_l93): self
    {
        $this->coord_y_l93 = $coord_y_l93;

        return $this;
    }   

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }

    /**
     * @return Collection|OperationPrelevement[]
     */
    public function getOperationPrelevements(): Collection
    {
        return $this->operationPrelevements;
    }

    public function addOperationPrelevement(OperationPrelevement $operationPrelevement): self
    {
        if (!$this->operationPrelevements->contains($operationPrelevement)) {
            $this->operationPrelevements[] = $operationPrelevement;
            $operationPrelevement->setPointPrelevement($this);
        }

        return $this;
    }

    public function removeOperationPrelevement(OperationPrelevement $operationPrelevement): self
    {
        if ($this->operationPrelevements->removeElement($operationPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($operationPrelevement->getPointPrelevement() === $this) {
                $operationPrelevement->setPointPrelevement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->station->getCode() . '-' . $this->num_base;
    }
}

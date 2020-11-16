<?php

namespace App\Entity;

use App\Repository\BaseStockageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BaseStockageRepository::class)
 */
class BaseStockage
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=OperationPrelevement::class, mappedBy="banque_stockage")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
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
            $operationPrelevement->setBanqueStockage($this);
        }

        return $this;
    }

    public function removeOperationPrelevement(OperationPrelevement $operationPrelevement): self
    {
        if ($this->operationPrelevements->removeElement($operationPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($operationPrelevement->getBanqueStockage() === $this) {
                $operationPrelevement->setBanqueStockage(null);
            }
        }

        return $this;
    }
}

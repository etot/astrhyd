<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StationRepository::class)
 */
class Station
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_masse_eau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_masse_eau;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detail_situation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $precision_positionnement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $suivi_indicateurs_fonctionnels;

    /**
     * @ORM\ManyToMany(targetEntity=Site::class, mappedBy="stations")
     */
    private $sites;

    /**
     * @ORM\ManyToOne(targetEntity=Finalite::class, inversedBy="stations2")
     * @ORM\JoinColumn(nullable=false)
     */
    private $finalite;

    /**
     * @ORM\OneToMany(targetEntity=PointPrelevement::class, mappedBy="station")
     */
    private $pointPrelevements;

    /**
     * @ORM\OneToMany(targetEntity=OperationPrelevement::class, mappedBy="station")
     */
    private $operationPrelevements;


    public function __construct()
    {
        $this->sites = new ArrayCollection();
        $this->pointPrelevements = new ArrayCollection();
        $this->operationPrelevements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCodeMasseEau(): ?string
    {
        return $this->code_masse_eau;
    }

    public function setCodeMasseEau(?string $code_masse_eau): self
    {
        $this->code_masse_eau = $code_masse_eau;

        return $this;
    }

    public function getNomMasseEau(): ?string
    {
        return $this->nom_masse_eau;
    }

    public function setNomMasseEau(?string $nom_masse_eau): self
    {
        $this->nom_masse_eau = $nom_masse_eau;

        return $this;
    }

    public function getDetailSituation(): ?string
    {
        return $this->detail_situation;
    }

    public function setDetailSituation(?string $detail_situation): self
    {
        $this->detail_situation = $detail_situation;

        return $this;
    }

    public function getPrecisionPositionnement(): ?string
    {
        return $this->precision_positionnement;
    }

    public function setPrecisionPositionnement(?string $precision_positionnement): self
    {
        $this->precision_positionnement = $precision_positionnement;

        return $this;
    }

    public function getSuiviIndicateursFonctionnels(): ?bool
    {
        return $this->suivi_indicateurs_fonctionnels;
    }

    public function setSuiviIndicateursFonctionnels(bool $suivi_indicateurs_fonctionnels): self
    {
        $this->suivi_indicateurs_fonctionnels = $suivi_indicateurs_fonctionnels;

        return $this;
    }

    public function __toString()
    {
        return $this->code . ' ' . $this->nom;
    }

    /**
     * @return Collection|Site[]
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }

    public function addSite(Site $site): self
    {
        if (!$this->sites->contains($site)) {
            $this->sites[] = $site;
            $site->addStation($this);
        }

        return $this;
    }

    public function removeSite(Site $site): self
    {
        if ($this->sites->removeElement($site)) {
            $site->removeStation($this);
        }

        return $this;
    }

    public function getFinalite(): ?Finalite
    {
        return $this->finalite;
    }

    public function setFinalite(?Finalite $finalite): self
    {
        $this->finalite = $finalite;

        return $this;
    }

    /**
     * @return Collection|PointPrelevement[]
     */
    public function getPointPrelevements(): Collection
    {
        return $this->pointPrelevements;
    }

    public function addPointPrelevement(PointPrelevement $pointPrelevement): self
    {
        if (!$this->pointPrelevements->contains($pointPrelevement)) {
            $this->pointPrelevements[] = $pointPrelevement;
            $pointPrelevement->setStation($this);
        }

        return $this;
    }

    public function removePointPrelevement(PointPrelevement $pointPrelevement): self
    {
        if ($this->pointPrelevements->removeElement($pointPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($pointPrelevement->getStation() === $this) {
                $pointPrelevement->setStation(null);
            }
        }

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
            $operationPrelevement->setStation($this);
        }

        return $this;
    }

    public function removeOperationPrelevement(OperationPrelevement $operationPrelevement): self
    {
        if ($this->operationPrelevements->removeElement($operationPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($operationPrelevement->getStation() === $this) {
                $operationPrelevement->setStation(null);
            }
        }

        return $this;
    }

}

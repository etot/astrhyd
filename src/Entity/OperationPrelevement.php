<?php

namespace App\Entity;

use App\Repository\OperationPrelevementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationPrelevementRepository::class)
 */
class OperationPrelevement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PointPrelevement::class, inversedBy="operationPrelevements")
     */
    private $pointPrelevement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_operation;

    /**
     * @ORM\Column(type="date")
     */
    private $date_prelevement;

    /**
     * @ORM\ManyToOne(targetEntity=MoSuivis::class, inversedBy="operationPrelevements")
     */
    private $mo_suivi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $interlocuteur_suivis;

    /**
     * @ORM\ManyToOne(targetEntity=Protocole::class, inversedBy="operationPrelevements")
     */
    private $protocole;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $conformite_ssm;

    /**
     * @ORM\ManyToOne(targetEntity=BaseStockage::class, inversedBy="operationPrelevements")
     */
    private $banque_stockage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Precision;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointPrelevement(): ?PointPrelevement
    {
        return $this->pointPrelevement;
    }

    public function setPointPrelevement(?PointPrelevement $pointPrelevement): self
    {
        $this->pointPrelevement = $pointPrelevement;

        return $this;
    }

    public function getCodeOperation(): ?string
    {
        return $this->code_operation;
    }

    public function setCodeOperation(?string $code_operation): self
    {
        $this->code_operation = $code_operation;

        return $this;
    }

    public function getDatePrelevement(): ?\DateTimeInterface
    {
        return $this->date_prelevement;
    }

    public function setDatePrelevement(\DateTimeInterface $date_prelevement): self
    {
        $this->date_prelevement = $date_prelevement;

        return $this;
    }

    public function getMoSuivi(): ?MoSuivis
    {
        return $this->mo_suivi;
    }

    public function setMoSuivi(?MoSuivis $mo_suivi): self
    {
        $this->mo_suivi = $mo_suivi;

        return $this;
    }

    public function getInterlocuteurSuivis(): ?string
    {
        return $this->interlocuteur_suivis;
    }

    public function setInterlocuteurSuivis(?string $interlocuteur_suivis): self
    {
        $this->interlocuteur_suivis = $interlocuteur_suivis;

        return $this;
    }

    public function getProtocole(): ?Protocole
    {
        return $this->protocole;
    }

    public function setProtocole(?Protocole $protocole): self
    {
        $this->protocole = $protocole;

        return $this;
    }

    public function getConformiteSsm(): ?bool
    {
        return $this->conformite_ssm;
    }

    public function setConformiteSsm(?bool $conformite_ssm): self
    {
        $this->conformite_ssm = $conformite_ssm;

        return $this;
    }

    public function getBanqueStockage(): ?BaseStockage
    {
        return $this->banque_stockage;
    }

    public function setBanqueStockage(?BaseStockage $banque_stockage): self
    {
        $this->banque_stockage = $banque_stockage;

        return $this;
    }

    public function getPrecision(): ?string
    {
        return $this->Precision;
    }

    public function setPrecision(?string $Precision): self
    {
        $this->Precision = $Precision;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}

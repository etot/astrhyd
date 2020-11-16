<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $code_reseau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_entite_hydro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $toponyme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_entite_hydro_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $toponyme_autre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diagnostic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $interlocuteur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $long_lineaire_restaure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $largeur_plein_bords_naturelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_roe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hauteur_chute_etiage_roe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hauteur_chute_hors_roe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee_debut_travaux_prevus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee_fin_travaux_prevus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee_effective_debut_travaux;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee_effective_fin_travaux;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif_travaux;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $elements_contexte;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity=DirectionRegionale::class, inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $direction_regionale;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTravaux::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_travaux_prevus;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTravaux::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_travaux_realises_principal;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTravaux::class)
     */
    private $type_travaux_realises_secondaire;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTravaux::class)
     */
    private $type_travaux_realises_accessoire;

    /**
     * @ORM\ManyToOne(targetEntity=ModaliteOperation::class, inversedBy="sites")
     */
    private $modalites_operation;

    /**
     * @ORM\ManyToOne(targetEntity=MesureAccompagnement::class, inversedBy="sites")
     */
    private $mesures_accompagnement;

    /**
     * @ORM\ManyToOne(targetEntity=MoTravaux::class, inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mo_travaux;

    /**
     * @ORM\ManyToMany(targetEntity=Station::class, inversedBy="sites", cascade={"persist"})
     */
    private $stations;

    /**
     * @ORM\OneToMany(targetEntity=PointPrelevement::class, mappedBy="site")
     */
    private $pointPrelevements;

    /**
     * @ORM\OneToMany(targetEntity=OperationPrelevement::class, mappedBy="site")
     */
    private $operationPrelevements;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
        $this->pointPrelevements = new ArrayCollection();
        $this->operationPrelevements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeReseau(): ?string
    {
        return $this->code_reseau;
    }

    public function setCodeReseau(string $code_reseau): self
    {
        $this->code_reseau = $code_reseau;

        return $this;
    }

    public function getCodeEntiteHydro(): ?string
    {
        return $this->code_entite_hydro;
    }

    public function setCodeEntiteHydro(string $code_entite_hydro): self
    {
        $this->code_entite_hydro = $code_entite_hydro;

        return $this;
    }

    public function getToponyme(): ?string
    {
        return $this->toponyme;
    }

    public function setToponyme(?string $toponyme): self
    {
        $this->toponyme = $toponyme;

        return $this;
    }

    public function getCodeEntiteHydro2(): ?string
    {
        return $this->code_entite_hydro_2;
    }

    public function setCodeEntiteHydro2(?string $code_entite_hydro_2): self
    {
        $this->code_entite_hydro_2 = $code_entite_hydro_2;

        return $this;
    }

    public function getToponymeAutre(): ?string
    {
        return $this->toponyme_autre;
    }

    public function setToponymeAutre(?string $toponyme_autre): self
    {
        $this->toponyme_autre = $toponyme_autre;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    public function getInterlocuteur(): ?string
    {
        return $this->interlocuteur;
    }

    public function setInterlocuteur(string $interlocuteur): self
    {
        $this->interlocuteur = $interlocuteur;

        return $this;
    }

    public function getLongLineaireRestaure(): ?int
    {
        return $this->long_lineaire_restaure;
    }

    public function setLongLineaireRestaure(?int $long_lineaire_restaure): self
    {
        $this->long_lineaire_restaure = $long_lineaire_restaure;

        return $this;
    }

    public function getLargeurPleinBordsNaturelle(): ?int
    {
        return $this->largeur_plein_bords_naturelle;
    }

    public function setLargeurPleinBordsNaturelle(?int $largeur_plein_bords_naturelle): self
    {
        $this->largeur_plein_bords_naturelle = $largeur_plein_bords_naturelle;

        return $this;
    }

    public function getCodeRoe(): ?string
    {
        return $this->code_roe;
    }

    public function setCodeRoe(?string $code_roe): self
    {
        $this->code_roe = $code_roe;

        return $this;
    }

    public function getHauteurChuteEtiageRoe(): ?int
    {
        return $this->hauteur_chute_etiage_roe;
    }

    public function setHauteurChuteEtiageRoe(?int $hauteur_chute_etiage_roe): self
    {
        $this->hauteur_chute_etiage_roe = $hauteur_chute_etiage_roe;

        return $this;
    }

    public function getHauteurChuteHorsRoe(): ?int
    {
        return $this->hauteur_chute_hors_roe;
    }

    public function setHauteurChuteHorsRoe(?int $hauteur_chute_hors_roe): self
    {
        $this->hauteur_chute_hors_roe = $hauteur_chute_hors_roe;

        return $this;
    }

    public function getAnneeDebutTravauxPrevus(): ?int
    {
        return $this->annee_debut_travaux_prevus;
    }

    public function setAnneeDebutTravauxPrevus(?int $annee_debut_travaux_prevus): self
    {
        $this->annee_debut_travaux_prevus = $annee_debut_travaux_prevus;

        return $this;
    }

    public function getAnneeFinTravauxPrevus(): ?int
    {
        return $this->annee_fin_travaux_prevus;
    }

    public function setAnneeFinTravauxPrevus(?int $annee_fin_travaux_prevus): self
    {
        $this->annee_fin_travaux_prevus = $annee_fin_travaux_prevus;

        return $this;
    }

    public function getAnneeEffectiveDebutTravaux(): ?int
    {
        return $this->annee_effective_debut_travaux;
    }

    public function setAnneeEffectiveDebutTravaux(?int $annee_effective_debut_travaux): self
    {
        $this->annee_effective_debut_travaux = $annee_effective_debut_travaux;

        return $this;
    }

    public function getAnneeEffectiveFinTravaux(): ?int
    {
        return $this->annee_effective_fin_travaux;
    }

    public function setAnneeEffectiveFinTravaux(?int $annee_effective_fin_travaux): self
    {
        $this->annee_effective_fin_travaux = $annee_effective_fin_travaux;

        return $this;
    }

    public function getDescriptifTravaux(): ?string
    {
        return $this->descriptif_travaux;
    }

    public function setDescriptifTravaux(?string $descriptif_travaux): self
    {
        $this->descriptif_travaux = $descriptif_travaux;

        return $this;
    }

    public function getElementsContexte(): ?string
    {
        return $this->elements_contexte;
    }

    public function setElementsContexte(?string $elements_contexte): self
    {
        $this->elements_contexte = $elements_contexte;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getDirectionRegionale(): ?DirectionRegionale
    {
        return $this->direction_regionale;
    }

    public function setDirectionRegionale(?DirectionRegionale $direction_regionale): self
    {
        $this->direction_regionale = $direction_regionale;

        return $this;
    }

    public function getTypeTravauxPrevus(): ?TypeTravaux
    {
        return $this->type_travaux_prevus;
    }

    public function setTypeTravauxPrevus(?TypeTravaux $type_travaux_prevus): self
    {
        $this->type_travaux_prevus = $type_travaux_prevus;

        return $this;
    }

    public function getTypeTravauxRealisesPrincipal(): ?TypeTravaux
    {
        return $this->type_travaux_realises_principal;
    }

    public function setTypeTravauxRealisesPrincipal(?TypeTravaux $type_travaux_realises_principal): self
    {
        $this->type_travaux_realises_principal = $type_travaux_realises_principal;

        return $this;
    }

    public function getTypeTravauxRealisesSecondaire(): ?TypeTravaux
    {
        return $this->type_travaux_realises_secondaire;
    }

    public function setTypeTravauxRealisesSecondaire(?TypeTravaux $type_travaux_realises_secondaire): self
    {
        $this->type_travaux_realises_secondaire = $type_travaux_realises_secondaire;

        return $this;
    }

    public function getTypeTravauxRealisesAccessoire(): ?TypeTravaux
    {
        return $this->type_travaux_realises_accessoire;
    }

    public function setTypeTravauxRealisesAccessoire(?TypeTravaux $type_travaux_realises_accessoire): self
    {
        $this->type_travaux_realises_accessoire = $type_travaux_realises_accessoire;

        return $this;
    }

    public function getModalitesOperation(): ?ModaliteOperation
    {
        return $this->modalites_operation;
    }

    public function setModalitesOperation(?ModaliteOperation $modalites_operation): self
    {
        $this->modalites_operation = $modalites_operation;

        return $this;
    }

    public function getMesuresAccompagnement(): ?MesureAccompagnement
    {
        return $this->mesures_accompagnement;
    }

    public function setMesuresAccompagnement(?MesureAccompagnement $mesures_accompagnement): self
    {
        $this->mesures_accompagnement = $mesures_accompagnement;

        return $this;
    }

    public function getMoTravaux(): ?MoTravaux
    {
        return $this->mo_travaux;
    }

    public function setMoTravaux(?MoTravaux $mo_travaux): self
    {
        $this->mo_travaux = $mo_travaux;

        return $this;
    }

    public function __toString()
    {
        return $this->code_reseau;
    }

    /**
     * @return Collection|Station[]
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    public function addStation(Station $station): self
    {
        if (!$this->stations->contains($station)) {
            $this->stations[] = $station;
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        $this->stations->removeElement($station);

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
            $pointPrelevement->setSite($this);
        }

        return $this;
    }

    public function removePointPrelevement(PointPrelevement $pointPrelevement): self
    {
        if ($this->pointPrelevements->removeElement($pointPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($pointPrelevement->getSite() === $this) {
                $pointPrelevement->setSite(null);
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
            $operationPrelevement->setSite($this);
        }

        return $this;
    }

    public function removeOperationPrelevement(OperationPrelevement $operationPrelevement): self
    {
        if ($this->operationPrelevements->removeElement($operationPrelevement)) {
            // set the owning side to null (unless already changed)
            if ($operationPrelevement->getSite() === $this) {
                $operationPrelevement->setSite(null);
            }
        }

        return $this;
    }
}

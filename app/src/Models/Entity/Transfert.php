<?php

namespace App\Models\Entity;

class Transfert {

    private ?int $id;
    private Inscription $inscription;
    private Etablissement $etablissementDestination;
    private Classe $classeDestination;
    private Utilisateur $utilisateur;
    private Date $dateTransfert;

    public function __construct(
        ?int $id,
        Inscription $inscription,
        Etablissement $etablissementDestination,
        Classe $classeDestination,
        Utilisateur $utilisateur,
        Date $dateTransfert
    ) {
        $this->id = $id;
        $this->inscription = $inscription;
        $this->etablissementDestination = $etablissementDestination;
        $this->classeDestination = $classeDestination;
        $this->utilisateur = $utilisateur;
        $this->dateTransfert = $dateTransfert;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getInscription(): Inscription
    {
        return $this->inscription;
    }

    public function setInscription(Inscription $inscription): void
    {
        $this->inscription = $inscription;
    }

    public function getEtablissementDestination(): Etablissement
    {
        return $this->etablissementDestination;
    }

    public function setEtablissementDestination(Etablissement $etablissementDestination): void
    {
        $this->etablissementDestination = $etablissementDestination;
    }

    public function getClasseDestination(): Classe
    {
        return $this->classeDestination;
    }

    public function setClasseDestination(Classe $classeDestination): void
    {
        $this->classeDestination = $classeDestination;
    }

    public function getUtilisateur(): Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): void
    {
        $this->utilisateur = $utilisateur;
    }

    public function getDateTransfert(): Date {
        return $this->dateTransfert;
    }

    public function setDateTransfert(Date $dateTransfert): void
    {
        $this->dateTransfert = $dateTransfert;
    }
}
<?php

class Inscription
{
    private ?int $id;
    private Eleve $eleve;
    private AnneeScolaire $annee;
    private Classe $classe;
    private Utilisateur $utilisateur;

    public function __construct(
        ?int $id,
        Eleve $eleve,
        AnneeScolaire $annee,
        Classe $classe,
        Utilisateur $utilisateur
    ) {
        $this->id = $id;
        $this->eleve = $eleve;
        $this->annee = $annee;
        $this->classe = $classe;
        $this->utilisateur = $utilisateur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getEleve(): Eleve
    {
        return $this->eleve;
    }

    public function setEleve(Eleve $eleve): void
    {
        $this->eleve = $eleve;
    }

    public function getAnnee(): AnneeScolaire
    {
        return $this->annee;
    }

    public function setAnnee(AnneeScolaire $annee): void
    {
        $this->annee = $annee;
    }

    public function getClasse(): Classe
    {
        return $this->classe;
    }

    public function setClasse(Classe $classe): void
    {
        $this->classe = $classe;
    }

    public function getUtilisateur(): Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): void
    {
        $this->utilisateur = $utilisateur;
    }
}
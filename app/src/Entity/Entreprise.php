<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_ape;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chiffre_d_affaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $complimentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste_occcupe;

    /**
     * @ORM\Column(type="geometry", options={"geometry_type"="POINT"})
     */

    private $cordonnees;


    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sujet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

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

    public function getCodeApe(): ?string
    {
        return $this->code_ape;
    }

    public function setCodeApe(string $code_ape): self
    {
        $this->code_ape = $code_ape;

        return $this;
    }

    public function getChiffreDAffaire(): ?string
    {
        return $this->chiffre_d_affaire;
    }

    public function setChiffreDAffaire(string $chiffre_d_affaire): self
    {
        $this->chiffre_d_affaire = $chiffre_d_affaire;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getComplimentaire(): ?string
    {
        return $this->complimentaire;
    }

    public function setComplimentaire(string $complimentaire): self
    {
        $this->complimentaire = $complimentaire;

        return $this;
    }

    public function getPosteOcccupe(): ?string
    {
        return $this->poste_occcupe;
    }

    public function setPosteOcccupe(string $poste_occcupe): self
    {
        $this->poste_occcupe = $poste_occcupe;

        return $this;
    }

    public function getCordonnees(): ?string
    {
        return $this->cordonnees;
    }

    public function setCordonnees(string $cordonnees): self
    {
        $this->cordonnees = $cordonnees;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }
}

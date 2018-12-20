<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=100)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", unique=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=true)
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, unique=true, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_passe", type="string", length=255)
     */
    private $motPasse;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Evenement")
     */
    private $participate;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Formation")
     */

    private $benefit;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Promotion")
     */
    private $promotion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Utilisateur
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Utilisateur
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return Utilisateur
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Utilisateur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set motPasse
     *
     * @param string $motPasse
     *
     * @return Utilisateur
     */
    public function setMotPasse($motPasse)
    {
        $this->motPasse = $motPasse;

        return $this;
    }

    /**
     * Get motPasse
     *
     * @return string
     */
    public function getMotPasse()
    {
        return $this->motPasse;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participate = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participate
     *
     * @param \AppBundle\Entity\Evenement $participate
     *
     * @return Utilisateur
     */
    public function addParticipate(\AppBundle\Entity\Evenement $participate)
    {
        $this->participate[] = $participate;

        return $this;
    }

    /**
     * Remove participate
     *
     * @param \AppBundle\Entity\Evenement $participate
     */
    public function removeParticipate(\AppBundle\Entity\Evenement $participate)
    {
        $this->participate->removeElement($participate);
    }

    /**
     * Get participate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipate()
    {
        return $this->participate;
    }

    /**
     * Add benefit
     *
     * @param \AppBundle\Entity\Formation $benefit
     *
     * @return Utilisateur
     */
    public function addBenefit(\AppBundle\Entity\Formation $benefit)
    {
        $this->benefit[] = $benefit;

        return $this;
    }

    /**
     * Remove benefit
     *
     * @param \AppBundle\Entity\Formation $benefit
     */
    public function removeBenefit(\AppBundle\Entity\Formation $benefit)
    {
        $this->benefit->removeElement($benefit);
    }

    /**
     * Get benefit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBenefit()
    {
        return $this->benefit;
    }


    /**
     * Set promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Utilisateur
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \AppBundle\Entity\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}

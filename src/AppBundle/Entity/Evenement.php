<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @ORM\Column(name="titre", type="string", length=50)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true, unique=true)
     */
    private $photo;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     */
    private $evaluate;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Module")
     */
    private $module;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Image", mappedBy="evenement", cascade={"remove"})
     */
    private $images;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Evenement
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
     * Constructor
     */
    public function __construct()
    {
        $this->evaluate = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add evaluate
     *
     * @param \AppBundle\Entity\Utilisateur $evaluate
     *
     * @return Evenement
     */
    public function addEvaluate(\AppBundle\Entity\User $evaluate)
    {
        $this->evaluate[] = $evaluate;

        return $this;
    }

    /**
     * Remove evaluate
     *
     * @param \AppBundle\Entity\User $evaluate
     */
    public function removeEvaluate(\AppBundle\Entity\User $evaluate)
    {
        $this->evaluate->removeElement($evaluate);
    }

    /**
     * Get evaluate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluate()
    {
        return $this->evaluate;
    }


    /**
     * Set module
     *
     * @param \AppBundle\Entity\Module $module
     *
     * @return Evenement
     */
    public function setModule(\AppBundle\Entity\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AppBundle\Entity\Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

}

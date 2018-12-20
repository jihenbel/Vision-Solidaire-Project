<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="libelle", type="string", length=100)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private $assurate;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Module")
     */
    private $module;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Promotion")
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Formation
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Formation
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
     * Constructor
     */
    public function __construct()
    {
        $this->assurate = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add assurate
     *
     * @param \AppBundle\Entity\Utilisateur $assurate
     *
     * @return Formation
     */
    public function addAssurate(\AppBundle\Entity\Utilisateur $assurate)
    {
        $this->assurate[] = $assurate;

        return $this;
    }

    /**
     * Remove assurate
     *
     * @param \AppBundle\Entity\Utilisateur $assurate
     */
    public function removeAssurate(\AppBundle\Entity\Utilisateur $assurate)
    {
        $this->assurate->removeElement($assurate);
    }

    /**
     * Get assurate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssurate()
    {
        return $this->assurate;
    }

    /**
     * Add module
     *
     * @param \AppBundle\Entity\Module $module
     *
     * @return Formation
     */
    public function addModule(\AppBundle\Entity\Module $module)
    {
        $this->module[] = $module;

        return $this;
    }

    /**
     * Remove module
     *
     * @param \AppBundle\Entity\Module $module
     */
    public function removeModule(\AppBundle\Entity\Module $module)
    {
        $this->module->removeElement($module);
    }

    /**
     * Get module
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Add promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Formation
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotion[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotion->removeElement($promotion);
    }

    /**
     * Get promotion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}

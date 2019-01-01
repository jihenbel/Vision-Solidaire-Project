<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
//use FOS\MessageBundle\Model\ParticipantInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, unique=true, nullable=true)
     */
    private $photo;

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
     * @var boolean
     * @ORM\Column(options={"default":true})
     */
    private $isActive;

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return User
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add participate.
     *
     * @param \AppBundle\Entity\Evenement $participate
     *
     * @return User
     */
    public function addParticipate(\AppBundle\Entity\Evenement $participate)
    {
        $this->participate[] = $participate;

        return $this;
    }

    /**
     * Remove participate.
     *
     * @param \AppBundle\Entity\Evenement $participate
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeParticipate(\AppBundle\Entity\Evenement $participate)
    {
        return $this->participate->removeElement($participate);
    }

    /**
     * Get participate.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipate()
    {
        return $this->participate;
    }

    /**
     * Add benefit.
     *
     * @param \AppBundle\Entity\Formation $benefit
     *
     * @return User
     */
    public function addBenefit(\AppBundle\Entity\Formation $benefit)
    {
        $this->benefit[] = $benefit;

        return $this;
    }

    /**
     * Remove benefit.
     *
     * @param \AppBundle\Entity\Formation $benefit
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBenefit(\AppBundle\Entity\Formation $benefit)
    {
        return $this->benefit->removeElement($benefit);
    }

    /**
     * Get benefit.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBenefit()
    {
        return $this->benefit;
    }

    /**
     * Set promotion.
     *
     * @param \AppBundle\Entity\Promotion|null $promotion
     *
     * @return User
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion.
     *
     * @return \AppBundle\Entity\Promotion|null
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}

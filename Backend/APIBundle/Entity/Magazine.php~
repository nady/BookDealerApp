<?php

namespace Backend\APIBundle\Entity;

/**
 * Magazine
 */
class Magazine
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var boolean
     */
    private $isSold;

    /**
     * @var boolean
     */
    private $isBooked;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $description;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Magazine
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Magazine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set isSold
     *
     * @param boolean $isSold
     *
     * @return Magazine
     */
    public function setIsSold($isSold)
    {
        $this->isSold = $isSold;

        return $this;
    }

    /**
     * Get isSold
     *
     * @return boolean
     */
    public function getIsSold()
    {
        return $this->isSold;
    }

    /**
     * Set isBooked
     *
     * @param boolean $isBooked
     *
     * @return Magazine
     */
    public function setIsBooked($isBooked)
    {
        $this->isBooked = $isBooked;

        return $this;
    }

    /**
     * Get isBooked
     *
     * @return boolean
     */
    public function getIsBooked()
    {
        return $this->isBooked;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Magazine
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Magazine
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Magazine
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $dealers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dealers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dealer
     *
     * @param \Backend\APIBundle\Entity\Dealer $dealer
     *
     * @return Magazine
     */
    public function addDealer(\Backend\APIBundle\Entity\Dealer $dealer)
    {
        $this->dealers[] = $dealer;

        return $this;
    }

    /**
     * Remove dealer
     *
     * @param \Backend\APIBundle\Entity\Dealer $dealer
     */
    public function removeDealer(\Backend\APIBundle\Entity\Dealer $dealer)
    {
        $this->dealers->removeElement($dealer);
    }

    /**
     * Get dealers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDealers()
    {
        return $this->dealers;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $magazine_dealer;


    /**
     * Add magazineDealer
     *
     * @param \Backend\APIBundle\Entity\MagazineDealer $magazineDealer
     *
     * @return Magazine
     */
    public function addMagazineDealer(\Backend\APIBundle\Entity\MagazineDealer $magazineDealer)
    {
        $this->magazine_dealer[] = $magazineDealer;

        return $this;
    }

    /**
     * Remove magazineDealer
     *
     * @param \Backend\APIBundle\Entity\MagazineDealer $magazineDealer
     */
    public function removeMagazineDealer(\Backend\APIBundle\Entity\MagazineDealer $magazineDealer)
    {
        $this->magazine_dealer->removeElement($magazineDealer);
    }

    /**
     * Get magazineDealer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMagazineDealer()
    {
        return $this->magazine_dealer;
    }
}

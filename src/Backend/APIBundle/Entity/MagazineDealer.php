<?php

namespace Backend\APIBundle\Entity;

/**
 * MagazineDealer
 */
class MagazineDealer
{
    /**
     * @var integer
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Backend\APIBundle\Entity\Magazine
     */
    private $magazine;

    /**
     * @var \Backend\APIBundle\Entity\Dealer
     */
    private $dealer;


    /**
     * Set status
     *
     * @param integer $status
     *
     * @return MagazineDealer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MagazineDealer
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
     * @return MagazineDealer
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
     * Set magazine
     *
     * @param \Backend\APIBundle\Entity\Magazine $magazine
     *
     * @return MagazineDealer
     */
    public function setMagazine(\Backend\APIBundle\Entity\Magazine $magazine)
    {
        $this->magazine = $magazine;

        return $this;
    }

    /**
     * Get magazine
     *
     * @return \Backend\APIBundle\Entity\Magazine
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

    /**
     * Set dealer
     *
     * @param \Backend\APIBundle\Entity\Dealer $dealer
     *
     * @return MagazineDealer
     */
    public function setDealer(\Backend\APIBundle\Entity\Dealer $dealer)
    {
        $this->dealer = $dealer;

        return $this;
    }

    /**
     * Get dealer
     *
     * @return \Backend\APIBundle\Entity\Dealer
     */
    public function getDealer()
    {
        return $this->dealer;
    }

    /**
     * @var integer
     */
    private $id;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return MagazineDealer
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

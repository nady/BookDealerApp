<?php

namespace Backend\APIBundle\Entity;

/**
 * Dealer
 */
class Dealer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $location;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $books;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dealer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Dealer
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Dealer
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
     * @return Dealer
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
     * Add book
     *
     * @param \Backend\APIBundle\Entity\Book $book
     *
     * @return Dealer
     */
    public function addBook(\Backend\APIBundle\Entity\Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \Backend\APIBundle\Entity\Book $book
     */
    public function removeBook(\Backend\APIBundle\Entity\Book $book)
    {
        $this->books->removeElement($book);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $magazines;


    /**
     * Add magazine
     *
     * @param \Backend\APIBundle\Entity\Magazine $magazine
     *
     * @return Dealer
     */
    public function addMagazine(\Backend\APIBundle\Entity\Magazine $magazine)
    {
        $this->magazines[] = $magazine;

        return $this;
    }

    /**
     * Remove magazine
     *
     * @param \Backend\APIBundle\Entity\Magazine $magazine
     */
    public function removeMagazine(\Backend\APIBundle\Entity\Magazine $magazine)
    {
        $this->magazines->removeElement($magazine);
    }

    /**
     * Get magazines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMagazines()
    {
        return $this->magazines;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $book;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $magazine;


    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Get magazine
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMagazine()
    {
        return $this->magazine;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $book_dealer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $magazine_dealer;


    /**
     * Add bookDealer
     *
     * @param \Backend\APIBundle\Entity\BookDealer $bookDealer
     *
     * @return Dealer
     */
    public function addBookDealer(\Backend\APIBundle\Entity\BookDealer $bookDealer)
    {
        $this->book_dealer[] = $bookDealer;

        return $this;
    }

    /**
     * Remove bookDealer
     *
     * @param \Backend\APIBundle\Entity\BookDealer $bookDealer
     */
    public function removeBookDealer(\Backend\APIBundle\Entity\BookDealer $bookDealer)
    {
        $this->book_dealer->removeElement($bookDealer);
    }

    /**
     * Get bookDealer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookDealer()
    {
        return $this->book_dealer;
    }

    /**
     * Add magazineDealer
     *
     * @param \Backend\APIBundle\Entity\MagazineDealer $magazineDealer
     *
     * @return Dealer
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

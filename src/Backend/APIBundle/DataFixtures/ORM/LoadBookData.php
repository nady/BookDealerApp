<?php

/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 14/01/2017
 * Time: 14:34
 * loading some default data into Book Entity
 */
namespace BackendAPIBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\APIBundle\Entity\Book;

class LoadBookData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     *
     * {@inheritDoc}
     */
    public function load (ObjectManager $manager){

        //Now we create a 100 general book
        for ($i = 1; $i <= 8; $i++) {
            $price = "$i.99"+ 5;
            $book = new Book();

            $book->setTitle("Book Series $i");
            $book->setDescription("How to tango the web.!");
            $book->setPrice($price);
            $book->setIsSold(false);
            $book->setIsBooked(false);
            $book->setCreatedAt(new \DateTime());
            $book->setUpdatedAt(new \DateTime());

            $this->addReference("book_series_$i", $book);
            $manager->persist($book);
            $manager->flush();
        }
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        // Load after Dealer data.
        return 1;
    }
}
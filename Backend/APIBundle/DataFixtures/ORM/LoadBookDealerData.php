<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 14/01/2017
 * Time: 17:30
 */

namespace BackendAPIBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\APIBundle\Entity\BookDealer;

/**
 * Class LoadBookDealerData
 * @package BackendAPIBundle\DataFixtures\ORM
 */
class LoadBookDealerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        {
            // Now we create a table with M:N books & Dealers.
            $random_dealer_array = array("dealer1", "dealer2", "dealer3", "dealer4", "dealer5", "dealer6");
            //Now we create a 100 general book
            for ($i = 1; $i <= 8; $i++) {
                $bDealer = new BookDealer();
                $bDealer->setId($i);
                $bDealer->setBook($this->getReference("book_series_$i"));
                $bDealer->setDealer($this->getReference($random_dealer_array[array_rand($random_dealer_array, 1)]));
                $bDealer->setStatus(1);
                $bDealer->setCreatedAt(new \DateTime());
                $bDealer->setUpdatedAt(new \DateTime());
                $manager->persist($bDealer);
                $manager->flush();

            }
        }
    }

    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 3;
    }
}
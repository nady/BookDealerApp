<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 15/01/2017
 * Time: 20:32
 */

namespace BackendAPIBundle\DataFixtures\ORM;
use Backend\APIBundle\Entity\MagazineDealer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMagazineDealerData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function getOrder()
    {
        return 5;
    }

    public function load(ObjectManager $manager)
    {
        // Now we create a table with M:N magazines & Dealers.
        //gets a random dealer from existing ones.
        $random_dealer_array = array("dealer1","dealer2","dealer3","dealer4","dealer5","dealer6");
        //Now we create a 100 general magazines
        for ($i = 1; $i <= 8; $i++)
        {
            $mDealer  = new MagazineDealer();
            $mDealer->setId($i);
            $mDealer->setMagazine($this->getReference("magazine_series_$i"));
            $mDealer->setDealer($this->getReference($random_dealer_array[array_rand($random_dealer_array, 1)]));
            $mDealer->setStatus(1);
            $mDealer->setCreatedAt(new \DateTime());
            $mDealer->setUpdatedAt(new \DateTime());
            $manager->persist($mDealer);
            $manager->flush();
        }

    }
}
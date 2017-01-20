<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 15/01/2017
 * Time: 20:31
 */

namespace BackendAPIBundle\DataFixtures\ORM;
use Backend\APIBundle\Entity\Magazine;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\APIBundle\Entity\MagazineData;

class LoadMagazineData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function getOrder()
    {
        return 4;
    }

    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        //Now we create a 100 general book
        for ($i = 1; $i <= 8; $i++) {
            $price = "$i.99"+ 2;
            $magazine = new Magazine();
            $magazine->setTitle("Style Magazine Series $i");
            $magazine->setDescription("How to cut your fat & be flat in 2 WEEKS.!");
            $magazine->setPrice($price);
            $magazine->setIsSold(false);
            $magazine->setIsBooked(false);
            $magazine->setCreatedAt(new \DateTime());
            $magazine->setUpdatedAt(new \DateTime());
            $this->addReference("magazine_series_$i", $magazine);
            $manager->persist($magazine);
            $manager->flush();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 14/01/2017
 * Time: 15:59
 */

namespace BackendAPIBundle\DataFixtures\ORM;
use Backend\APIBundle\Entity\Dealer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDealerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Creating a set of static dealers and dealerArray().

        $dealer1 = new Dealer();
        $dealer1->setName("Common Books Dealer!");
        $dealer1->setLocation("India");
        $dealer1->setCreatedAt(new \DateTime());
        $dealer1->setUpdatedAt(new \DateTime());
        $this->addReference('dealer1', $dealer1);

        $dealer2 = new Dealer();
        $dealer2->setName("Elseveir Books Dealer!");
        $dealer2->setLocation("Netherlands");
        $dealer2->setCreatedAt(new \DateTime());
        $dealer2->setUpdatedAt(new \DateTime());
        $this->addReference('dealer2', $dealer2);

        $dealer3 = new Dealer();
        $dealer3->setName("Kingston Books Dealer!");
        $dealer3->setLocation("British");
        $dealer3->setCreatedAt(new \DateTime());
        $dealer3->setUpdatedAt(new \DateTime());
        $this->addReference('dealer3', $dealer3);

        $dealer4 = new Dealer();
        $dealer4->setName("Oxford Books Dealer!");
        $dealer4->setLocation("British");
        $dealer4->setCreatedAt(new \DateTime());
        $dealer4->setUpdatedAt(new \DateTime());
        $this->addReference('dealer4', $dealer4);

        $dealer5 = new Dealer();
        $dealer5->setName("Bharat Books Dealer!");
        $dealer5->setLocation("India");
        $dealer5->setCreatedAt(new \DateTime());
        $dealer5->setUpdatedAt(new \DateTime());
        $this->addReference('dealer5', $dealer5);

        $dealer6 = new Dealer();
        $dealer6->setName("TOP Town Books!");
        $dealer6->setLocation("Germany");
        $dealer6->setCreatedAt(new \DateTime());
        $dealer6->setUpdatedAt(new \DateTime());
        $this->addReference('dealer6', $dealer6);

        $manager->persist($dealer6);
        $manager->persist($dealer1);
        $manager->persist($dealer2);
        $manager->persist($dealer3);
        $manager->persist($dealer4);
        $manager->persist($dealer5);
        $manager->flush();
    }

    public function getOrder()
    {
        // Load Initial.
        return 2;
    }
}
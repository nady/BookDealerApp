<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 17/01/2017
 * Time: 12:25
 */

namespace Backend\APIBundle\Repository;


class ContentRepository  extends \Doctrine\ORM\EntityRepository
{
    public function reorder($content)
    {
        $em = $this->getEntityManager();

        $count = 0;

        foreach($content as $i => $content_id){

            $q = $em->createQuery('update BackendAPIBundle:Magazine c set c.isBooked = ?1 where c.id = ?2')
                ->setParameter(1, true)
                ->setParameter(2, $content_id);
            $jsonDecoded = json_decode($q);
            var_dump($jsonDecoded);
            print_r();
            //check how many records updated.
            $count += $q->execute();
            print_r($count);

        }
        return $count;
    }
}
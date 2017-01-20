<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 15/01/2017
 * Time: 20:49
 */

namespace Backend\APIBundle\Controller;


use Backend\APIBundle\Entity\Magazine;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class MagazineController extends FOSRestController
{
    /**
     * Get all the magazines
     * @Rest\Get("/magazines")
     */
    public function getMagazinesAction(){
        //$magazines = $this->getDoctrine()->getRepository("BackendAPIBundle:Magazine")
        //    ->findAll();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
        FROM BackendAPIBundle:Magazine c'
        );
        $magazines = $query->getArrayResult();
        if ($magazines === null) {
            return new View("there are no magazines presently in your store.", Response::HTTP_NOT_FOUND);
        }
        $response = new Response(json_encode($magazines));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Get a magazine by ID
     * @Rest\Get("/magazines/{id}")
     */
    public function getMagazineAction($id)
    {
        $singleMagazine = $this->getDoctrine()->getRepository('BackendAPIBundle:Magazine')->find($id);
        if ($singleMagazine === null) {
            return new View("magazine not found", Response::HTTP_NOT_FOUND);
        }
        $response = $this->get('serializer')->serialize($singleMagazine, 'json');
        return new Response($response);
    }


    /**
     * Accepts Request $request
     * Returns View|array
     * @Rest\Put("/magazines/")
     */
    public function updateMagazineAction(Request $ids)
    {
        $count = $this->getDoctrine()->getRepository('BackendAPIBundle:Magazine')->reorder($ids);
        return new View("Updated_$count successfully ", Response::HTTP_OK);

    }

    /**
     * @Rest\Delete("/magazines/{id}")
     */
    public function deleteMagazineAction($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $magazine = $this->getDoctrine()->getRepository('BackendAPIBundle:Magazine')->find($id);
        if (empty($magazine)) {
            return new View("Magazine not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($magazine);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }
}
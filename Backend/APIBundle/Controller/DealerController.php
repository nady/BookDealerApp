<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 15/01/2017
 * Time: 20:48
 */

namespace Backend\APIBundle\Controller;


use Backend\APIBundle\Entity\Dealer;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;

class DealerController extends FOSRestController
{
    /**
     * Get all the books
     * @Rest\Get("/dealers")
     */
    public function getDealersAction(){
        //$dealers = $this->getDoctrine()->getRepository("BackendAPIBundle:Dealer")
        //    ->findAll();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
        FROM BackendAPIBundle:Dealer c'
        );
        $dealers = $query->getArrayResult();
        if ($dealers === null) {
            return new View("there are no dealers presently in your store.", Response::HTTP_NOT_FOUND);
        }
        $response = new Response(json_encode($dealers));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Get a dealer by ID
     * @Rest\Get("/dealers/{id}")
     */
    public function getDealerAction($id)
    {
        $singleDealer = $this->getDoctrine()->getRepository('BackendAPIBundle:Dealer')->find($id);
        if ($singleDealer === null) {
            return new View("Dealer not found", Response::HTTP_NOT_FOUND);
        }
        $response = $this->get('serializer')->serialize($singleDealer, 'json');
        return new Response($response);
    }

    public function updateStatus(){


    }

    /**
     * @Rest\Delete("/dealers/{id}")
     */
    public function deleteDealerAction($id)
    {
        $dData = new Dealer();
        $sn = $this->getDoctrine()->getManager();
        $dealer = $this->getDoctrine()->getRepository('BackendAPIBundle:Dealer')->find($id);
        if (empty($dealer)) {
            return new View("Dealer not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($dData);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }
}
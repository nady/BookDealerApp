<?php
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 15/01/2017
 * Time: 05:15
 */

namespace Backend\APIBundle\Controller;

use Backend\APIBundle\Entity\Book;
use Backend\APIBundle\Entity\BookDealer;
use Backend\APIBundle\Form\BookType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\FrameworkExtraBundle\Configuration\ParamConverter;

class BookController extends FOSRestController
{
    /**
     * Get all the books
     * @Rest\Get("/books")
     */
    public function getBooksAction()
    {
//        $books = $this->getDoctrine()->getRepository("BackendAPIBundle:Book")
//            ->findAll();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
        FROM BackendAPIBundle:Book c'
        );
        $books = $query->getArrayResult();
        if ($books === null) {
            return new View("there are no books presently in your store.", Response::HTTP_NOT_FOUND);
        }
        $response = new Response(json_encode($books));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Get a book by ID
     * @Rest\Get("/books/{id}")
     */
    public function getBookAction($id)
    {
        $singleBook = $this->getDoctrine()->getRepository('BackendAPIBundle:Book')->find($id);

        if ($singleBook === null) {
            return new View("Book not found", Response::HTTP_NOT_FOUND);
        }
        $response = $this->get('serializer')->serialize($singleBook, 'json');
        return new Response($response);

        //return $singleBook;
    }

    /**
     * @Rest\Post("/books")
     */
    public function postStatusAction(Request $request)
    {
        $addBook = new Book();
        $title = $request->get('title');
        $price = $request->get('price');
        if (empty($title) || empty($price)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $addBook->setTitle($title);
        $addBook->setPrice($price);
        $addBook->setDescription("Book Added by RESTservice!");
        $addBook->setIsBooked(false);
        $addBook->setIsSold(false);
        $em = $this->getDoctrine()->getManager();
        $em->persist($addBook);
        $em->flush();
        $data = ['Book Added Successfully' => $title];
        $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        return $view;
    }

    /**
     * Accepts Request $request
     * Returns View|array
     * @Rest\Post("/")
     */
    public function postBooksAction(Request $request)
    {
        $addBook = new Book();
        $title = $request->get('title');
        $price = $request->get('price');
        if (empty($title) || empty($price)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $addBook->setTitle($title);
        $addBook->setPrice($price);
        $addBook->setDescription("Book Added by RESTservice!");
        $addBook->setIsBooked(false);
        $addBook->setIsSold(false);
        //$q = $this->createQuery()
        // ->from('sfGuardUser u')
        //->leftJoin('u.Mishmember m WITH u.id = ?', $rel['member_id']);
//        $result = $query->fetchArray();
//        $mishmember = $result['Mishmember'];
//        unset($result['Mishmember']);
//        $user = array_merge($result, $mishmember);

        $em = $this->getDoctrine()->getManager();
        $em->persist($addBook);
        //$bd = new BookDealer();
        //$bd->setBook($userId);
        //$bd->setDealer($dealerId);
        //$bd->save();
        $em->flush();
        return new View("Book Added Successfully", Response::HTTP_OK);
    }

    /**
     * Accepts Request $request
     * Returns View|array
     * @Rest("/books/{id}")
     * @Method({"PUT","POST"})
     */

    public function updateBookAction($id, Request $request)
    {


        $book = $this->getDoctrine()->getRepository('BackendAPIBundle:Book')->find($id);
        if (empty($book)) {
            return new View("Book not found", Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(new BookType(), $book);
        $clearMissing = $request->getMethod() != 'PATCH';
        $form->submit($data, $clearMissing);
        $sn = $this->getDoctrine()->getManager();
        $sn->persist($book);
        $sn->flush();

        $data = $this->get('serializer')->serialize($book, 'json');
        return new Response($data);

    }


    /**
     * @Rest\Delete("/books/{id}")
     */
    public function deleteBookAction($id)
    {

        $sn = $this->getDoctrine()->getManager();
        $book = $this->getDoctrine()->getRepository('BackendAPIBundle:Book')->find($id);
        if (empty($book)) {
            return new View("Book not found", Response::HTTP_NOT_FOUND);
        } else {
            $sn->remove($book);
            $sn->flush();
        }
        $response = array("deleted successfully");
        //return  true;
        return new View("deleted successfully", Response::HTTP_OK);
    }

}
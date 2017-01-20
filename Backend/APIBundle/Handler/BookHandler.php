<?php
use Symfony\Component\Form\FormFactoryInterface;

private $formFactory;
/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 19/01/2017
 * Time: 02:21
 */
class BookHandler implements BookHandlerInterface
{
    // ..
    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    // ...
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new Page.
     *
     * @param array $parameters
     *
     * @return PageInterface
     */
    public function post(array $parameters)
    {
        $book = $this->createPage(); // factory method create an empty Page

        // Process form does all the magic, validate and hydrate the Book Object.
        return $this->processForm($book, $parameters, 'POST');
    }

    /**
     * Processes the form.
     *
     * @param BookInterface $page
     * @param array         $parameters
     * @param String        $method
     *
     * @return BookInterface
     *
     *
     */
    private function processForm(BookInterface $book, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new BookType(), $book, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $book = $form->getData();
            $this->om->persist($book);
            $this->om->flush($book);

            return $book;
        }
        return new View('Invalid submitted data', $form);
        //throw new InvalidFormException('Invalid submitted data', $form);
    }
}
# TaskBookApp
Done: Create a schema.xml (or doctrine/[entity name].yml) file(s) for the db.
Generate entities from yml to model.php

Done: Create RESTful Endpoints - A service to mark items as sold or pre-order
e.g 	getDealersData(List of Magazines or List of Books)
{ returns object->marked list,
}

Done: Function: Expects a list of either magazines or books as an argument and sets a rebate for those.
Return a reduced set of Magazines or books
Calculate the rebate based on input
Store the updated list in DB

Done: Function: Creates prices from "rounded" Euro prices, parameter is to be set / passed in console.
e.g 4.99 EUR out of 5.00 EUR (rounded)
e.g turn prices like 5.10 EUR into 4.99 (or 4.39 into 3.99 etc.)

Done : Restful Service: To retrieve the average prices of books or magazines

Done: Restful Service: To retrieve books and magazines from the dealers condition is to design the or have the actual SQL (no JPA container)

Done : For Jquery View:Function that retrieves a list of book dealers via AJAX from the DB (using a RESTful API).

# Code for POST and PUT
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
# Features of the App

# RESTAPIs Available

# Challenges

# Steps To Run


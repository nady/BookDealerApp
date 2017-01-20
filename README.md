# TaskBookApp 
Report with Screenshots and pictures attached.

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
*Frontend* : To make the app modular and keep Angular modules in sync with Symfony bundles.
 - The Angular JS frontend is implementated as Bundle with the symfony project, We can compile AngularJS using Assetic's filters, and gain performance in page loading.
- Filters for Assetic added here with FrontendBundle in which AngularJs rendered as a bundle
- RESTEnabled Services
- Serializer Bundle
- Nemio Bundle for CORS enabled message communication.


To run the project and test APIs:

- run composer install
- edit parameters.yml to set your mysql user, password and database name
- run php app/console doctrine:database:create
- run php app/console doctrine:schema:create
- Or run php app/console doctrine:schema:update --force
- run php app/console doctrine:fixtures:load (dummy data)
- open your browser and go to http://localhost/{your_project_folder}/app_dev.php/api/books to get via api rest all the books from  Backend/database or go to http://localhost/{your_project_folder}/app_dev.php/api/book/{id} (replace {id} with 1, 2 or 3, example: http://localhost/{your_project_folder}/app_dev.php/api/book/1) to get a custom book.

The links below defines the routes that need to test or consume our Api Rest.

FOSRestBundle annotations: To define the methods of the controller as resources Api Rest e.g for Book Entity.

@Get("/backend/api/books") - To Obtain records
@Post("/backend/api/books/{array}") - To create records
@Put("//backend/api/books/{id}") - To edit records
@Delete("/backend/api/books/{id}") - To delete records


DB Schema:


#  Task 1 Screen: 
Creating a schema.xml ([entity name].yml) file(s) for the db. Below Entities are created 
- (Book, Magazine, Dealer, BookDealer & MagazineDealer).

Book.orm.yml

    Backend\APIBundle\Entity\Book:
    type: entity
    table: book
    repositoryClass: Backend\APIBundle\Repository\BookRepository
    id:
        id:
            type: integer
            id: true
            options:
                unsigned: false
            generator:
                strategy: AUTO
    fields:
        title:
            type: string
            length: 50
        price:
            type: decimal
            scale: 2
        isSold:
            type: boolean
            default: false
        isBooked:
            type: boolean
            default: false
        createdAt:
            type: datetime
            nullable: true
            column: created_at
        updatedAt:
            type: datetime
            nullable: true
            column: updated_at
        description:
            type: text
    oneToMany:
        book_dealer:
            targetEntity: Backend\APIBundle\Entity\BookDealer
            mappedBy: book
            cascade: {  }
            fetch: LAZY
            inversedBy: null
            joinTable: null
            orderBy: null

Magazine.orm.yml 

    Backend\APIBundle\Entity\Magazine:
    type: entity
    table: magazine
    repositoryClass: Backend\APIBundle\Repository\MagazineRepository
    id:
        id:
            type: integer
            id: true
            options:
                unsigned: false
            generator:
                strategy: AUTO
    fields:
            title:
                type: string
                length: 50
            price:
                type: decimal
                scale: 2
            isSold:
                type: boolean
                default: false
            isBooked:
                type: boolean
                default: false
            createdAt:
                type: datetime
                nullable: true
                column: created_at
            updatedAt:
                type: datetime
                nullable: true
                column: updated_at
            description:
                type: text
    oneToMany:
        magazine_dealer:
            targetEntity: Backend\APIBundle\Entity\MagazineDealer
            mappedBy: magazine
            cascade: {  }
            fetch: LAZY
            inversedBy: null
            joinTable: null
            orderBy: null

ManyToMany Mapping Between Book and Dealer:
    
    Backend\APIBundle\Entity\BookDealer:
    type: entity
    table: book_dealer
    repositoryClass: Backend\APIBundle\Repository\BookDealerRepository
    id:
        id:
            type: integer
            id: true
        book:
            associationKey: true
        dealer:
            associationKey: true
    fields:
        status:
            type: integer(1)
        createdAt:
            type: datetime
        updatedAt:
            type: datetime
    manyToOne:
        book:
            targetEntity: Backend\APIBundle\Entity\Book
            inversedBy: book_dealer
            joinColumn:
                name: book_id
                referenceColumnName: id
        dealer:
            targetEntity: Backend\APIBundle\Entity\Dealer
            inversedBy: book_dealer
            joinColumn:
                name: dealer_id
                referenceColumnName: id

Frontend ScreenShots:

Backend ScreenShots: Displays bundle & entities creation, dependencies configuration for REST, CORS and Annotations

# RESTAPIs Available

# Challenges

# Steps To Run

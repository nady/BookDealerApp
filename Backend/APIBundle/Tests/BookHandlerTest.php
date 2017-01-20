<?php

/**
 * Created by PhpStorm.
 * User: Umra
 * Date: 19/01/2017
 * Time: 02:26
 */
class BookHandlerTest
{
    public function testGet()
    {
        $id = 1;
        $book = $this->getBook(); // create a Book object
        // I expect that the Book repository is called with find(1)
        $this->repository->expects($this->once())
            ->method('find')
            ->with($this->equalTo($id))
            ->will($this->returnValue($book));

        $this->bookHandler->get($id); // call the get.
    }
}
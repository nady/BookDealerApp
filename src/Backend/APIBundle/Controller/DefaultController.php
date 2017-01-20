<?php

namespace Backend\APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Get all the books
     * @return array
     *
     * @View()
     * @Get("/home")
     */
    public function indexAction()
    {
        return $this->render('BackendAPIBundle:Default:index.html.twig');
    }
}

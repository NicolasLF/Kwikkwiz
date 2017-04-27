<?php

namespace KZ\KwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KZKwizBundle:Default:index.html.twig');
    }
}

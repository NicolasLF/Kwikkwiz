<?php

namespace KZ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KZUserBundle:Default:index.html.twig');
    }
}

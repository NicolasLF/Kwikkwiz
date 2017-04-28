<?php

namespace KZ\KwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarteController extends Controller
{
    public function indexAction()
    {
        return $this->render('KZKwizBundle:Game:carte.html.twig');
    }
}

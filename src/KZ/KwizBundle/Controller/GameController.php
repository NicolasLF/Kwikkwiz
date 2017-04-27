<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 18:15
 */

namespace KZ\KwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    public function indexAction($id)
    {
        return $this->render('KZKwizBundle:Game:game.html.twig');
    }
}
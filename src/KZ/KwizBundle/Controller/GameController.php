<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 17:35
 */

namespace KZ\KwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{

    public function joinAction()
    {
        return $this->render('KZKwizBundle:join-game.html.twig');
    }
}
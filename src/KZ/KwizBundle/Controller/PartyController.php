<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 17:35
 */

namespace KZ\KwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartyController extends Controller
{

    public function getPartiesActive($active)
    {
        $em = $this->getDoctrine()->getManager();

        $parties = $em->getRepository('KZKwizBundle:Party')->findBy(['active'=>$active]);
        return $parties;
    }
    public function indexAction()
    {
        $parties = $this->getPartiesActive(0);
        return $this->render('KZKwizBundle:Party:join-party.html.twig', ['parties'=>$parties]);
    }
}
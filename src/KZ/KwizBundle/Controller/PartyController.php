<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 17:35
 */

namespace KZ\KwizBundle\Controller;

use KZ\KwizBundle\Entity\Party;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class PartyController extends Controller
{

    public function getParty($id)
    {
        $em = $this->getDoctrine()->getManager();
        $party = $em->getRepository('KZKwizBundle:Party')->find($id);
        return $party;
    }
    public function getPartiesActive($active)
    {
        $parties = $em->getRepository('KZKwizBundle:Party')->findBy(['active'=>$active]);
        return $parties;
    }
    public function indexAction($id)
    {
        if($id>0){
            $party = $this->getParty($id);

        }
        $parties = $this->getPartiesActive(1);
        return $this->render('KZKwizBundle:Party:joinParty.html.twig', ['parties'=>$parties]);
    }
}
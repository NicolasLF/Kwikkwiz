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
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class PartyController extends Controller
{

    public function getParty($id)
    {
        $em = $this->getDoctrine()->getManager();
        $party = $em->getRepository('KZKwizBundle:Party')->find($id);
        return $party;
    }
    public function getPartiesActive($active, $full)
    {
        $parties = $em->getRepository('KZKwizBundle:Party')->findBy(['active'=>$active, 'full'=>$full]);
        return $parties;
    }

    public function indexAction($id)
    {
        if($id>0){
            $party = $this->getParty($id);
            
        }
        $parties = $this->getPartiesActive(1, 0);
        return $this->render('KZKwizBundle:Party:joinParty.html.twig', ['parties'=>$parties]);
    }

    /**
     * Creates a new party entity.
     *
     * @Route("/new_game", name="kz_kwiz_new_game")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $party = new Party();
        $form = $this->createForm('KZ\KwizBundle\Form\PartyType', $party);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($party);
            $em->flush();

            return $this->redirectToRoute('kz_kwiz_game', array('id' => $party->getId()));
        }

        return $this->render('KZKwizBundle:Party:new-party.html.twig', array(
            'party' => $party,
            'form' => $form->createView(),
        ));
    }
}
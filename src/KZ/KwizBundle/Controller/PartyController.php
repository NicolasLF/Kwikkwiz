<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 17:35
 */

namespace KZ\KwizBundle\Controller;

use KZ\KwizBundle\Entity\Game;
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
        $em = $this->getDoctrine()->getManager();
        $parties = $em->getRepository('KZKwizBundle:Party')->findBy(['active'=>$active, 'full'=>$full]);
        return $parties;
    }
    public function getNbPlayer($id)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPlayer = $em->getRepository('KZKwizBundle:Party')->countNbPlayer($id);
        return $nbPlayer;
    }
    public function indexAction($id)
    {
        if($id>0){
            $party = $this->getParty($id);
            $em = $this->getDoctrine()->getManager();
            $game = new Game();
            $game->setUser($this->getUser());
            $game->setParty($party);
            $em->persist($game);
            $em->flush();
            $nbPlayerActive = $this->getNbPlayer($id);
            if($nbPlayerActive==$party->getNbPlayer()){
                $party->setFull(true);
                $em->persist($party);
                $em->flush();
            }
            return $this->redirectToRoute('kz_kwiz_game', array('id'=>$id));
        }
        $parties = $this->getPartiesActive(1, 0);
        return $this->render('KZKwizBundle:Party:joinParty.html.twig', ['parties'=>$parties]);
    }

    /**
     * Creates a new party entity.
     *
     * @Route("/newGame", name="kz_kwiz_new_game")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $party = new Party();
        $form = $this->createForm('KZ\KwizBundle\Form\PartyType', $party);
        $form->handleRequest($request);

//        var_dump($form);
//        die();
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
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
use KZ\KwizBundle\Entity\Square;
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
    public function getPlayers($id)
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
            $game->setTurn(0);
            $em->persist($game);
            $em->flush();
            $nbPlayerActive = $this->getPlayers($party);
            if($nbPlayerActive==$party->getNbPlayer()){
                die('full');
                $party->setFull(true);
                $em->persist($party);
                $em->flush();
            }
            return $this->redirectToRoute('kz_kwiz_game', array('id'=>$id));
        }
        $parties = $this->getPartiesActive(1, 0);
        return $this->render('KZKwizBundle:Party:joinParty.html.twig', ['parties'=>$parties]);
    }
    public function getCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('KZKwizBundle:Category')->findAll();
        return $categories;
    }

    public function generateBoard(Party $party)
    {
        $board = [];
        //Génération des cases questions
        for ($i = 1; $i <= 26; $i++) {
            $board[$i]['category'] = rand(0, 5);
            $board[$i]['type'] = 'Q';
        }
        //Génération des cases bonus
        for ($i = 27; $i <= 29; $i++) {
            $board[$i]['type'] = 'B';
            $board[$i]['category'] = rand(0, 5);
        }
        //Génération des cases malus
        for ($i = 30; $i <= 32; $i++) {
            $board[$i]['type'] = 'M';
            $board[$i]['category'] = rand(0, 5);
        }
        //Génération des cases pièges
        for ($i = 33; $i <= 35; $i++) {
            $board[$i]['type'] = 'P';
            $board[$i]['category'] = rand(0, 5);
        }
        //Génération des cases aléatoires
        for ($i = 36; $i <= 39; $i++) {
            $board[$i]['type'] = 'A';
            $board[$i]['category'] = rand(0, 5);
        }
        shuffle($board);
        $board[39]['type'] = 'Q';
        $board[39]['category'] = rand(0, 5);
        $tmp = $board[0];
        $board[0] = $board[39];
        $board[39] = $tmp;
        $categories = $this->getCategories();
        for ($i = 0; $i <= 39; $i++) {
            $em = $this->getDoctrine()->getManager();
            $square = new Square();
            $square->setParty($party);
            $square->setType($board[$i]['type']);
            $square->setCategory($categories[$board[$i]['category']]);
            $square->setNumber($i);
            $em->persist($square);
            $em->flush();
        }
        return $board;
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

        if ($form->isSubmitted() && $form->isValid()) {
            $party->setActive(1);
            $party->setFull(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($party);
            $em->flush();
            $game = new Game;
            $game->setUser($this->getUser());
            $game->setParty($party);
            $game->setTurn(1);
            $em->persist($game);
            $em->flush();
            $board = $this->generateBoard($party);
            return $this->redirectToRoute('kz_kwiz_game', array('id' => $party->getId()));
        }

        return $this->render('KZKwizBundle:Party:new-party.html.twig', array(
            'party' => $party,
            'form' => $form->createView(),
        ));
    }
}
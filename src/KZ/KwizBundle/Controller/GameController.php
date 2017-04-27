<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 18:15
 */

namespace KZ\KwizBundle\Controller;


use KZ\KwizBundle\Entity\Game;
use KZ\KwizBundle\Entity\History;
use KZ\KwizBundle\Entity\Party;
use KZ\KwizBundle\Entity\Square;
use KZ\KwizBundle\KZKwizBundle;

use KZ\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
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
        for($i=0;$i<=26;$i++){
            $board[$i]['category'] = rand(0,5);
            $board[$i]['type'] = 'Q';
        }
        //Génération des cases bonus
        for($i=27;$i<=29;$i++){
            $board[$i]['type'] = 'B';
            $board[$i]['category'] = rand(0,5);
        }
        //Génération des cases malus
        for($i=30;$i<=32;$i++){
            $board[$i]['type'] = 'M';
            $board[$i]['category'] = rand(0,5);
        }
        //Génération des cases pièges
        for($i=33;$i<=35;$i++){
            $board[$i]['type'] = 'P';
            $board[$i]['category'] = rand(0,5);
        }
        //Génération des cases aléatoires
        for($i=36;$i<=38;$i++){
            $board[$i]['type'] = 'A';
            $board[$i]['category'] = rand(0,5);
        }
        //Génération de la prison
        $board[39]['type'] = 'J';
        $board[39]['category'] = rand(0,5);
        shuffle($board);
        $categories = $this->getCategories();
        for($i=0;$i<=39;$i++){
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
    function getBoard(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $board = $em->getRepository('KZKwizBundle:Square')->findBy(['party'=>$party]);
        return $board;
    }
    public function isReady(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPlayer = $em->getRepository('KZKwizBundle:Party')->countNbPlayer($party);
        if($nbPlayer==$party->getNbPlayer()){
            return true;
        }
        return false;
    }
    public function jsToPhp($id, $query)
    {
        $em = $this->getDoctrine()->getManager();
        $party = $em->getRepository('KZKwizBundle:Party')->find($id);
        return $query($party);
    }
    public function indexAction(Party $party)
    {
        $board = $this->getBoard($party);
        if($this->isReady($party)){
            if($board==NULL){
                $board = $this->generateBoard($party);
            }
        }
        return $this->render('KZKwizBundle:Game:game.html.twig', ['board'=>$board]);
    }

    public function endAction(Party $party)
    {

        $square = $this->playerPositionAction($party, $this->getUser()->getId());

        if (41 == $square){

            $em = $this->getDoctrine()->getManager();

            $party = new Party();
            $partyActive = $em->getRepository($party)->find($idParty);

            //supprime les champs de la table Case qui ont l'id de la partie en cours
            $square = new Square();
            $squares = $em->getRepository($square)->findby(
                array('party_id' => $idParty )
            );

            foreach ($squares as $squareDel){
                $em->remove($squareDel);
            }
            //Remplie la table history du User en cours
            $history = new History();
            $history->setUser($this->getUser());
            $history->setParty($partyActive);
            $history->setRank(1);

            //Remplie la table history des autres Users
            $game = new Game();
            $games = $em->getRepository($game)->findBy(array(
                    'party_id' => $idParty,
            ));



        }
    }

    public function playerPositionAction(Party $party,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('KZUserBundle:User')->find($id);

        $games = $em->getRepository('KZKwizBundle:Game')->findOneBy(
            array(
                'party' => $party,
                'user' => $user
            ));
        return $games->getSquare()->getNumber();


    }


}
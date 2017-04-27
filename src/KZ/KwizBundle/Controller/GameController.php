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
use KZ\KwizBundle\Entity\Position;
use KZ\KwizBundle\Entity\Square;
use KZ\KwizBundle\KZKwizBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    public function indexAction($id)
    {
        return $this->render('KZKwizBundle:Game:game.html.twig');
    }

    public function endAction($square, $idParty)
    {
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

    public function playerPositionAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $games = $em->getRepository('KZKwizBundle:Game')->findBy(
            array(
            'party' => $id,
        ));


        for ($i = 0; $i < count($games); $i++){
          $playerPosition[] =  $em->getRepository('KZKwizBundle:Position')->findBy(
                array(
                    'user' => $games[$i]->getUser()
                ));
        }

        var_dump($playerPosition);
        die();
    }
}
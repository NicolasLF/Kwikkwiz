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
    public function getThisSquare(Party $party, $num)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('KZKwizBundle:Square')->findOneBy(['party' => $party, 'number' => $num]);
    }

    public function startGame(Party $party)
    {
        $games = $this->getGames($party);
        $square = $this->getThisSquare($party, '0');
        foreach ($games as $game) {
            $em = $this->getDoctrine()->getManager();
            $game->getUser()->getId();
            $game = $em->getRepository('KZKwizBundle:Game')->find($game->getId());
            $game->setSquare($square);
            $em->flush();
        }
        return true;
    }

    public function getCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('KZKwizBundle:Category')->findAll();
        return $categories;
    }

    public function getGames(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('KZKwizBundle:Game')->findBy(['party' => $party]);
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
        for ($i = 36; $i <= 38; $i++) {
            $board[$i]['type'] = 'A';
            $board[$i]['category'] = rand(0, 5);
        }
        //Génération de la prison
        $board[39]['type'] = 'J';
        $board[39]['category'] = rand(0, 5);
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

    function getBoard(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $board = $em->getRepository('KZKwizBundle:Square')->findBy(['party' => $party]);
        return $board;
    }

    public function isReady(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPlayer = $em->getRepository('KZKwizBundle:Party')->countNbPlayer($party);
        if ($nbPlayer == $party->getNbPlayer()) {
            return true;
        }
        return false;
    }

    public function indexAction(Party $party)
    {
        $board = $this->getBoard($party);
        if ($this->isReady($party)) {
            $party->setFull(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($party);
            $em->flush();
            if ($board == NULL) {
                $board = $this->generateBoard($party);
            }
            if($this->startGame($party)){
                $this->setTurns($party);
            }
        }
        return $this->render('KZKwizBundle:Game:game.html.twig', ['board' => $board]);
    }

    public function endAction(Party $party)
    {

        $squareActive = $this->playerPositionAction($party, $this->getUser()->getId());

        if (38 == $squareActive) {

            $em = $this->getDoctrine()->getManager();

            //Remplie la table history du User en cours
            $games = $em->getRepository('KZKwizBundle:Game')->findBy(
                array(
                    'party' => $party,
                ),
                array(
                    'square' => 'DESC'
                ));

            $i = 1;
            foreach ($games as $game) {
                $history = new History();
                $history->setUser($game->getUser());
                $history->setParty($party);
                $history->setRank($i);
                $i++;
                $em->persist($history);
                $em->flush();


            }


            //supprime les champs de la table Game
            foreach ($games as $game) {
                $em->remove($game);
                $em->flush();
            }
            //supprime les champs de la table Case qui ont l'id de la partie en cours
            $squares = $em->getRepository('KZKwizBundle:Square')->findby(
                array('party' => $party)
            );
            foreach ($squares as $squareDel) {
                $em->remove($squareDel);
                $em->flush();
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

    public function playerPositionAction(Party $party, $id)
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

    public function getThisGame(Square $square)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('KZUserBundle:Square')->find($square);
        $games = $em->getRepository('KZKwizBundle:Game')->findOneBy(
            array(
                'party' => $party,
                'user' => $user
            )
        );
        return $games->getSquare()->getNumber();
    }

    public function move(Party $party, User $user, $move)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('KZKwizBundle:Game')->findOneBy(
            array(
                'party' => $party,
                'user' => $user
            )
        );
        $square = $em->getRepository('KZKwizBundle:Square')->findOneBy(
            array(
                'number' => $game->getSquare()->getNumber() + $move,
            )
        );
        $game->setSquare($square);
        $em->persist($game);
        $em->flush();
        return $square;
    }
    public function setTurns(Party $party)
    {
        $games = $this->getGames($party);
        dump($games);
        die();
    }

    public function turn(Party $party)
    {
        $dice = rand(1, 6);
        $position = $this->playerPositionAction($party, $this->getUser()->getId());
        $square = $this->getThisSquare($party, $position);
        $turn = true;
        while ($turn == true) {
            if ($square->getCategory() == 'Q') {
                //if true
                $this->move($party, $this->getUser(), $dice);
            } else if ($square->getCategory() == ' B') {

            } else if ($square->getCategory() == 'M') {

            } else if ($square->getCategory() == 'A') {

            } else if ($square->getCategory() == 'P') {

            } else if ($square->getCategory() == 'J') {

            }
        }
        $this->setTurns($party);
    }

    public function bonusAction($party)
    {
        $bonus = array(
            array(
                'text' => 'Avancez de 3 cases supplémentaires',
                'type' => 'case',
                'for' => 'user',
                'act' => 3,
            ),
            array(
                'text' => 'Tout le monde recule d\'une case... Sauf vous!',
                'type' => 'case',
                'for' => 'users',
                'act' => -1,
            ),
            array(
                'text' => 'Inverser la position avec le premier',
                'type' => 'inverse',
                'for' => 'Ouser',
                'act' => 'inverse',
            )
        );
        $nbTurn = count($bonus);
        $key = rand(0, $nbTurn - 1);

        var_dump($bonus[$key]);

        $em = $this->getDoctrine()->getManager();

        $party = $em->getRepository('KZKwizBundle:Party')->find($party);


        $user = $this->getUser();
        $games = $em->getRepository('KZKwizBundle:Game')->findByParty($party);
        $gameCurrent = $em->getRepository('KZKwizBundle:Game')->findBy(
            array(
                'party' => $party,
                'user' => $this->getUser()
            )

        );

        if ('case' == $bonus[$key]['type']) {
            if ('user' == $bonus[$key]['for']) {
                $this->move($party, $user, $bonus[$key]['act']);
            } elseif ('users' == $bonus[$key]['for']) {
                foreach ($games as $game) {
                    if ($game->getUser() !== $this->getUser()) {
                        $this->move($party, $game->getUser(), $bonus[$key]['act']);
                    }
                }
            }
        } elseif ('inverse' == $bonus[$key]['type']) {
            $gameFirst = $em->getRepository('KZKwizBundle:Game')->findBy(
                array(
                    'party' => $party,
                ),
                array(
                    'square' => 'DESC'
                ));
            $diff = $gameFirst[0]->getSquare()->getNumber() - $gameCurrent[0]->getSquare()->getNumber();
            $this->move($party, $gameFirst[0]->getUser(), -$diff);
            $this->move($party, $this->getUser(), $diff);
        }

    }

    public function malusAction(Square $square)
    {

    }

    public function piegeAction(Square $square)
    {

    }

    public function randomAction(Square $square)
    {

    }

    public function prisonAction(Square $square)
    {
    }

    public function jsToPhp($id, $query)
    {
        $em = $this->getDoctrine()->getManager();
        $party = $em->getRepository('KZKwizBundle:Party')->find($id);
        return $query($party);
    }

}
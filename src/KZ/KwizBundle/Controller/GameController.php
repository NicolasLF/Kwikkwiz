<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 18:15
 */

namespace KZ\KwizBundle\Controller;


use KZ\KwizBundle\Entity\Answer;
use KZ\KwizBundle\Entity\Game;
use KZ\KwizBundle\Entity\History;
use KZ\KwizBundle\Entity\Party;
use KZ\KwizBundle\Entity\Square;
use KZ\KwizBundle\KZKwizBundle;

use KZ\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
            if($game->getSquare()==NULL){
                $game = $em->getRepository('KZKwizBundle:Game')->find($game->getId());
                $game->setSquare($square);
                $em->flush();
            }
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



    public  function getBoard(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $board = $em->getRepository('KZKwizBundle:Square')->findBy(['party' => $party]);
        return $board;
    }
    public function getOneQuestion()
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository('KZKwizBundle:Question')->findAll();
        $i = rand(0,count($questions)-1);
        return $questions[$i];
    }
    public function getOneAnswer($question)
    {
        $em = $this->getDoctrine()->getManager();
        $answer = $em->getRepository('KZKwizBundle:Answer')->findBy(
            array(
                'question' => $question,
            )
        );
        return $answer;
    }
    public function getThisCategory($question)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('KZKwizBundle:Category')->findOneBy(
            array(
                'question' => $question,
            )
        );
        return $category;
    }
    public function getOneCard(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('KZUserBundle:User')->find($id);
        $game = $em->getRepository('KZKwizBundle:Game')->findOneBy(
            array(
                'party' => $party,
                'user' => $user
            ));
        $square = $game->getSquare();
        if ($square->getCategory() == 'Q') {
            return $this->getOneQuestion();
        } else if ($square->getCategory() == ' B') {
            return $this->bonusAction($party);
        } else if ($square->getCategory() == 'M') {
            return $this->malusAction($party);
        } else if ($square->getCategory() == 'P') {
            return $this->piegeAction($party);
        } else if ($square->getCategory() == 'A') {
            return $this->randomAction($party);
        }

    }
    public function verifAnswerAction(Answer $answer, Party $party)
    {
        $status = $answer->getCorrect();
        $question = $this->getOneQuestion();
        $answers = $this->getOneAnswer($question);
        $board = $this->getBoard($party);

       if($status==1) {
           $this->turn($party);
           $isTurn = $this->isTurn($party);
           if($isTurn==-1){
              return $this->redirectToRoute('kz_kwiz_endGame', array('id'=>$party->getId()));
           }
           return $this->render('KZKwizBundle:Game:game.html.twig', ['board' => $board, 'isTurn'=>$isTurn, 'question'=>$question, 'answers'=>$answers, 'party'=>$party]);
       }
       else{
           $this->setTurns($party);
           $isTurn = $this->isTurn($party);
          return $this->redirectToRoute('kz_kwiz_game', array('id'=>$party->getId()));

       }

    }
    public function indexAction(Party $party)
    {
        $card = $this->getOneCard($party);
        $answers = $this->getOneAnswer($card);
        $board = $this->getBoard($party);
        if ($party->getFull()==true) {
            $isTurn = $this->isTurn($party);
            $this->startGame($party);
        }else {
            $isTurn = 2;
        }
        if($isTurn==0 or $isTurn==2){
            header("Refresh: 1");
        }else if($isTurn==-1){
            $this->redirectToRoute('kz_kwiz_endGame', array('id'=>$party));
        }

        return $this->render('KZKwizBundle:Game:game.html.twig', ['board' => $board, 'isTurn'=>$isTurn, 'question'=>$card, 'answers'=>$answers, 'party'=>$party]);
    }

    public function historyAction(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $history = $em->getRepository('KZKwizBundle:History')->findOneBy(
            array(
                'party' => $party,
                'user' => $this->getUser()
            )
        );
        dump($history);
        return $this->render('KZKwizBundle:Game:end-game.html.twig', ['history' => $history, 'user'=>$this->getUser()]);
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

    public function getThisGame(Party $party)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('KZUserBundle:User')->find($party);
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
        $em = $this->getDoctrine()->getManager();
        $games = $this->getGames($party);
        for ($i = 0; $i < count($games); $i++) {
            if ($games[$i]->getTurn() == 1) {
                $games[$i]->setTurn(0);
                $em->persist($games[$i]);
                $em->flush();
                if ($i + 1 < count($games)) {
                    $games[$i + 1]->setTurn(1);
                    $em->persist($games[$i + 1]);
                    $em->flush();
                } else {
                    $games[0]->setTurn(1);
                    $em->persist($games[0]);
                    $em->flush();
                }
                $i = count($games);
            }
        }
    }
    public function isTurn(Party $party)
    {
        if($party->getActive()==0){
            return -1;
        }
        $em = $this->getDoctrine()->getManager();
        $status = $em->getRepository('KZKwizBundle:Game')->findBy(
            array(
                'party' => $party,
                'user' => $this->getUser()
            )
        );

        return $status[0]->getTurn();
    }
    public function turn(Party $party)
    {
        $dice = rand(1, 6);
        $this->move($party, $this->getUser(), $dice);
        $position = $this->playerPositionAction($party, $this->getUser()->getId());
        $square = $this->getThisSquare($party, $position);
        return true;
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
                return $bonus[$key]['text'];
            } elseif ('users' == $bonus[$key]['for']) {
                foreach ($games as $game) {
                    if ($game->getUser() !== $this->getUser()) {
                        $this->move($party, $game->getUser(), $bonus[$key]['act']);
                        return $bonus[$key]['text'];
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
            return $bonus[$key]['text'];
        }

    }

    public function malusAction($party)
    {
        $malus = array(
            array(
                'text' => 'Reculez de 3 cases',
                'type' => 'case',
                'for' => 'user',
                'act' => -3,
            ),
            array(
                'text' => 'Tout le monde avance d\'une case... Sauf vous!',
                'type' => 'case',
                'for' => 'users',
                'act' => 1,
            ),
            array(
                'text' => 'Inverser la position avec le dernier',
                'type' => 'inverse',
                'for' => 'Ouser',
                'act' => 'inverse',
            )
        );
        $nbTurn = count($malus);
        $key = rand(0, $nbTurn - 1);

        var_dump($malus[$key]);

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

        if ('case' == $malus[$key]['type']) {
            if ('user' == $malus[$key]['for']) {
                $this->move($party, $user, $malus[$key]['act']);
                return $malus[$key]['text'];
            } elseif ('users' == $malus[$key]['for']) {
                foreach ($games as $game) {
                    if ($game->getUser() !== $this->getUser()) {
                        $this->move($party, $game->getUser(), $malus[$key]['act']);
                        return $malus[$key]['text'];
                    }
                }
            }
        } elseif ('inverse' == $malus[$key]['type']) {
            $gameLast = $em->getRepository('KZKwizBundle:Game')->findBy(
                array(
                    'party' => $party,
                ),
                array(
                    'square' => 'ASC'
                ));
            $diff = $gameCurrent[0]->getSquare()->getNumber() - $gameLast[0]->getSquare()->getNumber();
            $this->move($party, $gameLast[0]->getUser(), $diff);
            $this->move($party, $this->getUser(), -$diff);
            return $malus[$key]['text'];
        }
    }

    public function piegeAction($party)
    {
        $piege = array(
            array(
                'text' => 'Retour à la case départ',
                'type' => 'return',
                'for' => 'user',
                'act' => 0,
            )
        );
        $nbTurn = count($piege);
        $key = rand(0, $nbTurn - 1);

        var_dump($piege[$key]);

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


        if ('return' == $piege[$key]['type']) {
            $this->move($party, $this->getUser(), -$gameCurrent[0]->getSquare()->getNumber());
            return $piege[$key]['text'];
        }
    }

    public function randomAction($party)
    {
        $select = array(
            0 => 'bonus',
            1 => 'malus',
            2 => 'piege'
        );

        $key = rand(0,2);
        $choice = $select[$key];
        $method = $choice.'Action';
        $this->$method($party);
    }

    public function prisonAction(Square $square)
    {
    }
    public function refreshAction()
    {
        return new JsonResponse('test');
    }
}
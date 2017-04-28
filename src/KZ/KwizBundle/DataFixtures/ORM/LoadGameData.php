<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:01
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Game;


class LoadGameData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user1'),
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user1'),
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user2'),
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user2'),
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user1'),
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user2'),
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user3'),
            ),
            array(
                'party' => $this->getReference('party3'),
                'user' => $this->getReference('user1'),
            ),
            array(
                'party' => $this->getReference('party3'),
                'user' => $this->getReference('user2'),
            ),
            array(
                'party' => $this->getReference('party4'),
                'user' => $this->getReference('user1'),
            ),
        );
        foreach ($data as $item){
            $sql = new Game();
            $sql->setParty($item['party']);
            $sql->setUser($item['user']);
            $sql->setTurn(0);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }
}
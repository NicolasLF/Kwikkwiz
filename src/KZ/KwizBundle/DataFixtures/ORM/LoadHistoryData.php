<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:01
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\History;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadAnswerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user1'),
                'rank' => 1
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user2'),
                'rank' => 2
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user3'),
                'rank' => 3
            ),
            array(
                'party' => $this->getReference('party1'),
                'user' => $this->getReference('user4'),
                'rank' => 4
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user1'),
                'rank' => 1
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user2'),
                'rank' => 2
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user3'),
                'rank' => 3
            ),
            array(
                'party' => $this->getReference('party2'),
                'user' => $this->getReference('user1'),
                'rank' => 1
            ),
            array(
                'party' => $this->getReference('party3'),
                'user' => $this->getReference('user2'),
                'rank' => 2
            ),
            array(
                'party' => $this->getReference('party4'),
                'user' => $this->getReference('user1'),
                'rank' => 1
            ),
        );
        $i = 0;
        foreach ($data as $item){
            $sql = new History();
            $sql->setParty($item['party']);
            $sql->setUser($item['user']);
            $sql->setRank($item['rank']);
            $manager->persist($sql);
            $manager->flush();
            $i++;
        }
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
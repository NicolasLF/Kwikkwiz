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


class LoadHistoryData
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'party' => 1,
                'user' => 1,
                'rank' => 1
            ),
            array(
                'party' => 1,
                'user' => 2,
                'rank' => 2
            ),
            array(
                'party' => 1,
                'user' => 3,
                'rank' => 3
            ),
            array(
                'party' => 1,
                'user' => 4,
                'rank' => 4
            ),
            array(
                'party' => 2,
                'user' => 1,
                'rank' => 1
            ),
            array(
                'party' => 2,
                'user' => 2,
                'rank' => 2
            ),
            array(
                'party' => 2,
                'user' => 3,
                'rank' => 3
            ),
            array(
                'party' => 3,
                'user' => 1,
                'rank' => 1
            ),
            array(
                'party' => 3,
                'user' => 2,
                'rank' => 2
            ),
            array(
                'party' => 4,
                'user' => 1,
                'rank' => 1
            ),
        );
        foreach ($data as $item){
            $sql = new History();
            $sql->setParty($item['party']);
            $sql->setUser($item['user']);
            $sql->setRank($item['rank']);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
}
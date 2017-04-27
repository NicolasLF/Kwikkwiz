<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 13:35
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Party;


class LoadPartyData
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'name' => "Party 1",
                'active' => 0,
                'level' => 1,
                'mode' => 1,
                'nbPlayer' => 4
            ),
            array(
                'name' => "Party 2",
                'active' => 0,
                'level' => 2,
                'mode' => 2,
                'nbPlayer' => 3
            ),
            array(
                'name' => "Party 3",
                'active' => 0,
                'level' => 3,
                'mode' => 3,
                'nbPlayer' => 2
            ),
            array(
                'name' => "Party 4",
                'active' => 0,
                'level' => 2,
                'mode' => 3,
                'nbPlayer' => 1
            ),
        );
        foreach ($data as $item){
            $sql = new Party();
            $sql->setName($item['name']);
            $sql->setActive($item['active']);
            $sql->setLevel($item['level']);
            $sql->setMode($item['mode']);
            $sql->setNbPlayer($item['nbPlayer']);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
}
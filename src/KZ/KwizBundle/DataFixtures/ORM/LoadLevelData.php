<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:35
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Level;

class LoadLevelData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'name' => 'Facile',
                'color' => 'blue'
            ),
            array(
                'name' => 'Moyen',
                'color' => 'red'
            ),
            array(
                'name' => 'Difficile',
                'color' => 'black'
            ),
        );
        foreach ($data as $item){
            $sql = new Level();
            $sql->setName($item['name']);
            $sql->setColor($item['color']);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
}
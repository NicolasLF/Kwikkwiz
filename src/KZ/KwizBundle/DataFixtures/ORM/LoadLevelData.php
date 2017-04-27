<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:35
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Level;

class LoadLevelData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
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
        $i = 0;
        foreach ($data as $item){
            $sql = new Level();
            $sql->setName($item['name']);
            $sql->setColor($item['color']);
            $this->addReference('level'.$i++, $sql);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
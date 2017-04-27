<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 13:35
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Party;


class LoadPartyData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'name' => "Party 1",
                'active' => 0,
                'level' => $this->getReference('level1'),
                'mode' => 1,
                'nbPlayer' => 4,
                'full' => true
            ),
            array(
                'name' => "Party 2",
                'active' => 0,
                'level' => $this->getReference('level2'),
                'mode' => 2,
                'nbPlayer' => 3,
                'full' => true
            ),
            array(
                'name' => "Party 3",
                'active' => 0,
                'level' => $this->getReference('level3'),
                'mode' => 3,
                'nbPlayer' => 2,
                'full' => true
            ),
            array(
                'name' => "Party 4",
                'active' => 0,
                'level' => $this->getReference('level2'),
                'mode' => 3,
                'nbPlayer' => 1,
                'full' => true
            ),
        );
        $i = 1;
        foreach ($data as $item){
            $sql = new Party();
            $sql->setName($item['name']);
            $sql->setActive($item['active']);
            $sql->setLevel($item['level']);
            $sql->setMode($item['mode']);
            $sql->setNbPlayer($item['nbPlayer']);
            $this->addReference('party'.$i++, $sql);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}
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
use KZ\KwizBundle\Entity\Category;


class LoadCategoryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'name' => 'Sports',
                'color' => 'red',
                'icon' => '',
            ),
            array(
                'name' => 'Musique',
                'color' => 'blue',
                'icon' => '',
            ),
            array(
                'name' => 'Cinéma',
                'color' => 'yellow',
                'icon' => '',
            ),
            array(
                'name' => 'Histoire',
                'color' => 'green',
                'icon' => '',
            ),
            array(
                'name' => 'Géographie',
                'color' => 'white',
                'icon' => '',
            ),
            array(
                'name' => 'Sciences',
                'color' => 'orange',
                'icon' => '',
            ),
        );
        $i = 1;
        foreach ($data as $item){
            $sql = new Category();
            $sql->setName($item['name']);
            $sql->setColor($item['color']);
            $sql->setIcon($item['icon']);
            $this->addReference('category'.$i++, $sql);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}
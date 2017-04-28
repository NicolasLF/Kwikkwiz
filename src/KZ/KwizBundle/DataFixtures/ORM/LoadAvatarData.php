<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:32
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Avatar;

class LoadAvatarData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'img' => 'Wicoo',
            ),
            array(
                'img' => 'Mwartine',
            ),
            array(
                'img' => 'Pawtwik',
            ),
            array(
                'img' => 'Qwentin',
            ),
        );
        $i = 1;
        foreach ($data as $item) {
            $sql = new Avatar();
            $sql->setImg($item['img']);
            $manager->persist($sql);
            $manager->flush();
            $this->addReference('avatar' . $i, $sql);
            $i++;
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
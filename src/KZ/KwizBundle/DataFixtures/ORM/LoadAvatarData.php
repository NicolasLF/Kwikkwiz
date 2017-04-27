<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 27/04/17
 * Time: 14:32
 */

namespace KZ\KwizBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KZ\KwizBundle\Entity\Avatar;

class LoadAvatarData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'img' => 'avatar1.png',
            ),
            array(
                'img' => 'avatar2.png',
            ),
            array(
                'img' => 'avatar3.png',
            ),
            array(
                'img' => 'avatar4.png',
            ),
        );
        foreach ($data as $item){
            $sql = new Avatar();
            $sql->setImg($item['img']);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
}
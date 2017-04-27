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
use KZ\KwizBundle\Entity\Question;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadQuestionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'type' => "text",
                'content' => "Question 1",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "Question 2",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "Question 3",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "Question 4",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "Question 5",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "Question 6",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "Question 7",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "Question 8",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "Question 9",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "Question 10",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "Question 11",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "Question 12",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "Question 13",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "Question 14",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "Question 15",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "Question 16",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category6'),
            ),
            array(
                'type' => "text",
                'content' => "Question 17",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category6'),
            ),
            array(
                'type' => "text",
                'content' => "Question 18",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category6'),
            ),
        );
        $i=1;
        foreach ($data as $item){
            $sql = new Question();
            $sql->setType($item['type']);
            $sql->setContent($item['content']);
            $sql->setLevel($item['level']);
            $sql->setCategory($item['category']);
            $this->addReference('question'.$i, $sql);
            $manager->persist($sql);
            $manager->flush();
            $i++;
        }
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 8;
    }
}
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


class LoadQuestionData
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'type' => "text",
                'content' => "Question 1",
                'level' => 1,
                'category' => 1,
            ),
            array(
                'type' => "text",
                'content' => "Question 2",
                'level' => 2,
                'category' => 1,
            ),
            array(
                'type' => "text",
                'content' => "Question 3",
                'level' => 3,
                'category' => 1,
            ),
            array(
                'type' => "text",
                'content' => "Question 4",
                'level' => 1,
                'category' => 2,
            ),
            array(
                'type' => "text",
                'content' => "Question 5",
                'level' => 2,
                'category' => 2,
            ),
            array(
                'type' => "text",
                'content' => "Question 6",
                'level' => 3,
                'category' => 2,
            ),
            array(
                'type' => "text",
                'content' => "Question 7",
                'level' => 1,
                'category' => 3,
            ),
            array(
                'type' => "text",
                'content' => "Question 8",
                'level' => 2,
                'category' => 3,
            ),
            array(
                'type' => "text",
                'content' => "Question 9",
                'level' => 3,
                'category' => 3,
            ),
            array(
                'type' => "text",
                'content' => "Question 10",
                'level' => 1,
                'category' => 4,
            ),
            array(
                'type' => "text",
                'content' => "Question 11",
                'level' => 2,
                'category' => 4,
            ),
            array(
                'type' => "text",
                'content' => "Question 12",
                'level' => 3,
                'category' => 4,
            ),
            array(
                'type' => "text",
                'content' => "Question 13",
                'level' => 1,
                'category' => 5,
            ),
            array(
                'type' => "text",
                'content' => "Question 14",
                'level' => 2,
                'category' => 5,
            ),
            array(
                'type' => "text",
                'content' => "Question 15",
                'level' => 3,
                'category' => 5,
            ),
            array(
                'type' => "text",
                'content' => "Question 16",
                'level' => 1,
                'category' => 6,
            ),
            array(
                'type' => "text",
                'content' => "Question 17",
                'level' => 2,
                'category' => 6,
            ),
            array(
                'type' => "text",
                'content' => "Question 18",
                'level' => 3,
                'category' => 6,
            ),
        );
        foreach ($data as $item){
            $sql = new Question();
            $sql->setType($item['type']);
            $sql->setContent($item['content']);
            $sql->setLevel($item['level']);
            $sql->setCategory($item['category']);
            $manager->persist($sql);
            $manager->flush();
        }
        $manager->flush();
    }
}
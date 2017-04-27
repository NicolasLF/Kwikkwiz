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
use KZ\KwizBundle\Entity\Answer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadAnswerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = array(
            array(
                'answer' => "Answer 1",
                'question' => 1,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 2",
                'question' => 1,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 3",
                'question' => 1,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 4",
                'question' => 1,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 5",
                'question' => 2,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 6",
                'question' => 2,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 7",
                'question' => 2,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 8",
                'question' => 2,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 9",
                'question' => 3,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 10",
                'question' => 3,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 11",
                'question' => 3,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 12",
                'question' => 3,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 13",
                'question' => 4,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 14",
                'question' => 4,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 15",
                'question' => 4,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 16",
                'question' => 4,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 17",
                'question' => 5,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 18",
                'question' => 5,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 19",
                'question' => 5,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 20",
                'question' => 5,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 21",
                'question' => 6,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 22",
                'question' => 6,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 23",
                'question' => 6,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 24",
                'question' => 6,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 25",
                'question' => 7,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 26",
                'question' => 7,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 27",
                'question' => 7,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 28",
                'question' => 7,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 29",
                'question' => 8,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 30",
                'question' => 8,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 31",
                'question' => 8,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 32",
                'question' => 8,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 33",
                'question' => 9,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 34",
                'question' => 9,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 35",
                'question' => 9,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 36",
                'question' => 9,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 37",
                'question' => 10,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 38",
                'question' => 10,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 39",
                'question' => 10,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 40",
                'question' => 10,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 41",
                'question' => 11,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 42",
                'question' => 11,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 43",
                'question' => 11,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 44",
                'question' => 11,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 45",
                'question' => 12,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 46",
                'question' => 12,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 47",
                'question' => 12,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 48",
                'question' => 12,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 49",
                'question' => 13,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 50",
                'question' => 13,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 51",
                'question' => 13,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 52",
                'question' => 13,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 53",
                'question' => 14,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 54",
                'question' => 14,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 55",
                'question' => 14,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 56",
                'question' => 14,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 57",
                'question' => 15,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 58",
                'question' => 15,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 59",
                'question' => 15,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 60",
                'question' => 15,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 61",
                'question' => 16,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 62",
                'question' => 16,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 63",
                'question' => 16,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 64",
                'question' => 16,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 65",
                'question' => 17,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 66",
                'question' => 17,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 67",
                'question' => 17,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 68",
                'question' => 17,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 69",
                'question' => 18,
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 70",
                'question' => 18,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 71",
                'question' => 18,
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 72",
                'question' => 18,
                'correct' => 0,
            ),
        );
        $i = 0;
        foreach ($data as $item){
            $sql = new Answer();
            $sql->setAnswer($item['answer']);
            $sql->setQuestion($this->getReference('question'.$i));
            $sql->setCorrect($item['correct']);
            $manager->persist($sql);
            $manager->flush();
            $i++;
        }
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
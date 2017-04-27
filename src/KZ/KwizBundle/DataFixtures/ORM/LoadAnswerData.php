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
                'question' => $this->getReference('question1'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 2",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 3",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 4",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 5",
                'question' => $this->getReference('question2'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 6",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 7",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 8",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 9",
                'question' => $this->getReference('question3'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 10",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 11",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 12",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 13",
                'question' => $this->getReference('question4'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 14",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 15",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 16",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 17",
                'question' => $this->getReference('question5'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 18",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 19",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 20",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 21",
                'question' => $this->getReference('question6'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 22",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 23",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 24",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 25",
                'question' => $this->getReference('question7'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 26",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 27",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 28",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 29",
                'question' => $this->getReference('question8'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 30",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 31",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 32",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 33",
                'question' => $this->getReference('question9'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 34",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 35",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 36",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 37",
                'question' => $this->getReference('question10'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 38",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 39",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 40",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 41",
                'question' => $this->getReference('question11'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 42",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 43",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 44",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 45",
                'question' => $this->getReference('question12'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 46",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 47",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 48",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 49",
                'question' => $this->getReference('question13'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 50",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 51",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 52",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 53",
                'question' => $this->getReference('question14'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 54",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 55",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 56",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 57",
                'question' => $this->getReference('question15'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 58",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 59",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 60",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 61",
                'question' => $this->getReference('question16'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 62",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 63",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 64",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 65",
                'question' => $this->getReference('question17'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 66",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 67",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 68",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 69",
                'question' => $this->getReference('question18'),
                'correct' => 1,
            ),
            array(
                'answer' => "Answer 70",
                'question' => $this->getReference('question18'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 71",
                'question' => $this->getReference('question18'),
                'correct' => 0,
            ),
            array(
                'answer' => "Answer 72",
                'question' => $this->getReference('question18'),
                'correct' => 0,
            ),
        );
        $i = 1;
        foreach ($data as $item){
            $sql = new Answer();
            $sql->setAnswer($item['answer']);
            $sql->setQuestion($item['question']);
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
        return 9;
    }
}
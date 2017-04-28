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
                'answer' => "1997",
                'question' => $this->getReference('question1'),
                'correct' => 1,
            ),
            array(
                'answer' => "2021",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "1997",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "52 avant J-C",
                'question' => $this->getReference('question1'),
                'correct' => 0,
            ),
            array(
                'answer' => "...buts.",
                'question' => $this->getReference('question2'),
                'correct' => 1,
            ),
            array(
                'answer' => "... reverts.",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "... cochonets.",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "... dribles.",
                'question' => $this->getReference('question2'),
                'correct' => 0,
            ),
            array(
                'answer' => "\"... on est tous ensembleuh.\"",
                'question' => $this->getReference('question3'),
                'correct' => 1,
            ),
            array(
                'answer' => "\"... on est tous avec vous.\"",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "\"... on est tous derrière vous.\"",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "\"... on est tous.\"",
                'question' => $this->getReference('question3'),
                'correct' => 0,
            ),
            array(
                'answer' => "Non. Lui non plus c'est ça ?",
                'question' => $this->getReference('question4'),
                'correct' => 1,
            ),
            array(
                'answer' => "Elle est bien urbaine.",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Oui.",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Gilbert qui ?",
                'question' => $this->getReference('question4'),
                'correct' => 0,
            ),
            array(
                'answer' => "Bleu",
                'question' => $this->getReference('question5'),
                'correct' => 1,
            ),
            array(
                'answer' => "Gris",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Marron",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Jaune",
                'question' => $this->getReference('question5'),
                'correct' => 0,
            ),
            array(
                'answer' => "Sol",
                'question' => $this->getReference('question6'),
                'correct' => 1,
            ),
            array(
                'answer' => "Trololo",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Si i la mifa",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Ré aigü",
                'question' => $this->getReference('question6'),
                'correct' => 0,
            ),
            array(
                'answer' => "Aucun soucis",
                'question' => $this->getReference('question7'),
                'correct' => 1,
            ),
            array(
                'answer' => "La seule limite est ton imagination",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Une fonction magique PHP",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le féminin de Akunamontonton",
                'question' => $this->getReference('question7'),
                'correct' => 0,
            ),
            array(
                'answer' => "Une belle daube",
                'question' => $this->getReference('question8'),
                'correct' => 1,
            ),
            array(
                'answer' => "Le plus beau film que la terre ait porté",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "À la hauteur des critiques",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "Ryan y lé tro bo",
                'question' => $this->getReference('question8'),
                'correct' => 0,
            ),
            array(
                'answer' => "Jadis",
                'question' => $this->getReference('question9'),
                'correct' => 1,
            ),
            array(
                'answer' => "Je ne crois pas",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "En 1997",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "OSEF",
                'question' => $this->getReference('question9'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le 7 mai",
                'question' => $this->getReference('question10'),
                'correct' => 1,
            ),
            array(
                'answer' => "Le 8 mai",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le mémé",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le Peine, c'est pas la peine",
                'question' => $this->getReference('question10'),
                'correct' => 0,
            ),
            array(
                'answer' => "1962",
                'question' => $this->getReference('question11'),
                'correct' => 1,
            ),
            array(
                'answer' => "1961",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "1960",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "1961,5",
                'question' => $this->getReference('question11'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le cessé de feux sur le sol algérien",
                'question' => $this->getReference('question12'),
                'correct' => 1,
            ),
            array(
                'answer' => "Jo cé pa",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "La Seconde Guerre Mondiale",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "Vichy Célestin",
                'question' => $this->getReference('question12'),
                'correct' => 0,
            ),
            array(
                'answer' => "Pithiviers",
                'question' => $this->getReference('question13'),
                'correct' => 1,
            ),
            array(
                'answer' => "Morville",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "Chilleurs-Aux-Bois",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "Bouzonville-Aux-Bois",
                'question' => $this->getReference('question13'),
                'correct' => 0,
            ),
            array(
                'answer' => "28",
                'question' => $this->getReference('question14'),
                'correct' => 1,
            ),
            array(
                'answer' => "51",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "2",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "Oui",
                'question' => $this->getReference('question14'),
                'correct' => 0,
            ),
            array(
                'answer' => "Maputo",
                'question' => $this->getReference('question15'),
                'correct' => 1,
            ),
            array(
                'answer' => "Pithiviers",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "La Mer Noire",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "Le Caire",
                'question' => $this->getReference('question15'),
                'correct' => 0,
            ),
            array(
                'answer' => "Hypertext Preprocessor",
                'question' => $this->getReference('question16'),
                'correct' => 1,
            ),
            array(
                'answer' => "Phphoulalaaaaaa !",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "Programming Hyper Programms",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "Processor Hight Peanut",
                'question' => $this->getReference('question16'),
                'correct' => 0,
            ),
            array(
                'answer' => "ARN",
                'question' => $this->getReference('question17'),
                'correct' => 1,
            ),
            array(
                'answer' => "RAN",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "RNA",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "PHP",
                'question' => $this->getReference('question17'),
                'correct' => 0,
            ),
            array(
                'answer' => "Quentin, Nicolas, Hagera, Camille",
                'question' => $this->getReference('question18'),
                'correct' => 1,
            ),
            array(
                'answer' => "Isabelle, Thibault, Pinsard, Tanguy",
                'question' => $this->getReference('question18'),
                'correct' => 0,
            ),
            array(
                'answer' => "Véro, Fanny, Sylvain, Julien",
                'question' => $this->getReference('question18'),
                'correct' => 0,
            ),
            array(
                'answer' => "Les autres <3",
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
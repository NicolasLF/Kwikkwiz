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
                'content' => "En quelle année est né Footix ?",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "Le foot, c'est super. Surtout les...",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "\"Allez, les Bleus...\"",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category1'),
            ),
            array(
                'type' => "text",
                'content' => "T'as vu la femme de Gilbert ?",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "De quelle couleur est le Pépito de Sébastien Tellier ?",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "Do Ré Mi Fa",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category2'),
            ),
            array(
                'type' => "text",
                'content' => "Akunamatata, ce mot signifie...",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "Frinchmin LA LA LA, c'était...",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "Le cinéma fut inventé...",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category3'),
            ),
            array(
                'type' => "text",
                'content' => "C'est quand qu'on vote ?",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "L'année de signature des accrords d'Évian",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "C'est quoi, les accords d'Évian ?",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category4'),
            ),
            array(
                'type' => "text",
                'content' => "Le bled le plus mitteux du coin ?",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "Combien de pays dans l'UE ?",
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "Quelle est la capitale du Mozambique ?",
                'level' => $this->getReference('level3'),
                'category' => $this->getReference('category5'),
            ),
            array(
                'type' => "text",
                'content' => "C'est quoi, le PHP ?",
                'level' => $this->getReference('level1'),
                'category' => $this->getReference('category6'),
            ),
            array(
                'type' => "text",
                'content' => "L\'ADN se transforme en..." ,
                'level' => $this->getReference('level2'),
                'category' => $this->getReference('category6'),
            ),
            array(
                'type' => "text",
                'content' => "C'est qui qui va gagner ?",
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
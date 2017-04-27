<?php

namespace KZ\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, FixtureInterface, OrderedFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $data = array(
            array(
                'email' => 'admin@admin.com',
                'username' => 'admin1',
                'avatar' => $this->getReference('avatar1'),
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin1@admin.com',
                'username' => 'admin2',
                'avatar' => $this->getReference('avatar2'),
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin2@admin.com',
                'username' => 'admin3',
                'avatar' => $this->getReference('avatar3'),
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin3@admin.com',
                'username' => 'admin4',
                'avatar' => $this->getReference('avatar4'),
                'pass' => 'admin',
            )
        );
        $i = 1;
        foreach ($data as $item) {
            $user = $userManager->createUser();
            $user->setEmail($item['email']);
            $user->setUsername($item['username']);
            $user->setAvatar($item['avatar']);
            $user->setPlainPassword('pass');
            $user->setEnabled(true);
            $user->addRole('ROLE_AS');
            $userManager->updateUser($user);
            $this->addReference('user'. $i, $user);
            $i++;
        }

    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}
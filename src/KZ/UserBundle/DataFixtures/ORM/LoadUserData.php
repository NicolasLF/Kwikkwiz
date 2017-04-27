<?php

namespace KZ\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface
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
                'avatar' => 'avatar1.png',
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin1@admin.com',
                'username' => 'admin2',
                'avatar' => 'avatar2.png',
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin2@admin.com',
                'username' => 'admin3',
                'avatar' => 'avatar3.png',
                'pass' => 'admin',
            ),
            array(
                'email' => 'admin3@admin.com',
                'username' => 'admin4',
                'avatar' => 'avatar4.png',
                'pass' => 'admin',
            )
        );
        foreach ($data as $item) {
            $user = $userManager->createUser();
            $user->setEmail($item['email']);
            $user->setUsername($item['username']);
            $user->setPlainPassword('pass');
            $user->setEnabled(true);
            $user->addRole('ROLE_AS');
            $this->addReference('user-admin', $user);
            $userManager->updateUser($user);
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
}
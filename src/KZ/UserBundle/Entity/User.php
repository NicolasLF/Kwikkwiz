<?php

namespace KZ\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="KZ\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="KZ\KwizBundle\Entity\Avatar")
     */
    private $avatar;


    /**
     * Set avatar
     *
     * @param \KZ\KwizBundle\Entity\Avatar $avatar
     * @return User
     */
    public function setAvatar(\KZ\KwizBundle\Entity\Avatar $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \KZ\KwizBundle\Entity\Avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}

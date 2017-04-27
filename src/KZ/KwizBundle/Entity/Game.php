<?php

namespace KZ\KwizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="KZ\KwizBundle\Repository\GameRepository")
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Party")
     */
    private $party;

    /**
     *
     * @ORM\ManyToOne(targetEntity="KZ\UserBundle\Entity\User", fetch="EAGER")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="KZ\KwizBundle\Entity\Square")
     */
    private $square;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set party
     *
     * @param integer $party
     *
     * @return Game
     */
    public function setParty($party)
    {
        $this->party = $party;

        return $this;
    }

    /**
     * Get party
     *
     * @return int
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Game
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUsera()
    {
        return $this->user;
    }

    /**
     * Get user
     *
     * @return \KZ\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set square
     *
     * @param \KZ\KwizBundle\Entity\Square $square
     *
     * @return Game
     */
    public function setSquare(\KZ\KwizBundle\Entity\Square $square = null)
    {
        $this->square = $square;

        return $this;
    }

    /**
     * Get square
     *
     * @return \KZ\KwizBundle\Entity\Square
     */
    public function getSquare()
    {
        return $this->square;
    }
}

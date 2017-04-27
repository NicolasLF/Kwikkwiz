<?php

namespace KZ\KwizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Square
 *
 * @ORM\Table(name="square")
 * @ORM\Entity(repositoryClass="KZ\KwizBundle\Repository\SquareRepository")
 */
class Square
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
     * @var int
     *
     * @ORM\Column(name="Board", type="integer")
     * @ORM\ManyToOne(targetEntity="Board")
     */
    private $board;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * Set board
     *
     * @param integer $board
     *
     * @return Square
     */
    public function setBoard($board)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return int
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Square
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}


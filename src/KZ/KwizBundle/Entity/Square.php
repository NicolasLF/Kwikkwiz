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
     * @ORM\Column(name="Party", type="integer")
     * @ORM\ManyToOne(targetEntity="Party")
     */
    private $party;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="Category", type="integer")
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category;


    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


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
     * @param integer $party
     *
     * @return Square
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


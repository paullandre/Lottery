<?php
/*src/Utility/SessionBundle/Entity/Server.php*/

namespace Lottery\PlayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Server
 *
 * @ORM\Table(name="server")
 * @ORM\Entity(repositoryClass="Lottery\PlayBundle\Repository\ServerRepository")
 */
class Server
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="first", type="smallint")
     */
    private $first;

    /**
     * @var integer
     *
     * @ORM\Column(name="second", type="smallint")
     */
    private $second;

    /**
     * @var integer
     *
     * @ORM\Column(name="third", type="smallint")
     */
    private $third;

    /**
     * @var integer
     *
     * @ORM\Column(name="fourth", type="smallint")
     */
    private $fourth;

    /**
     * @var integer
     *
     * @ORM\Column(name="fifth", type="smallint")
     */
    private $fifth;

    /**
     * @var integer
     *
     * @ORM\Column(name="sixth", type="smallint")
     */
    private $sixth;

    /**
     * @var string
     *
     * @ORM\Column(name="date_drawn", type="string", length=255)
     */
    private $dateDrawn;

    /**
     * @var integer
     *
     * @ORM\Column(name="has_winner", type="integer")
     */
    private $hasWinner;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_winners", type="integer")
     */
    private $numberOfWinners;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set first
     *
     * @param integer $first
     * @return Server
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return integer
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set second
     *
     * @param integer $second
     * @return Server
     */
    public function setSecond($second)
    {
        $this->second = $second;

        return $this;
    }

    /**
     * Get second
     *
     * @return integer
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     * Set third
     *
     * @param integer $third
     * @return Server
     */
    public function setThird($third)
    {
        $this->third = $third;

        return $this;
    }

    /**
     * Get third
     *
     * @return integer
     */
    public function getThird()
    {
        return $this->third;
    }

    /**
     * Set fourth
     *
     * @param integer $fourth
     * @return Server
     */
    public function setFourth($fourth)
    {
        $this->fourth = $fourth;

        return $this;
    }

    /**
     * Get fourth
     *
     * @return integer
     */
    public function getFourth()
    {
        return $this->fourth;
    }

    /**
     * Set fifth
     *
     * @param integer $fifth
     * @return Server
     */
    public function setFifth($fifth)
    {
        $this->fifth = $fifth;

        return $this;
    }

    /**
     * Get fifth
     *
     * @return integer
     */
    public function getFifth()
    {
        return $this->fifth;
    }

    /**
     * Set sixth
     *
     * @param integer $sixth
     * @return Server
     */
    public function setSixth($sixth)
    {
        $this->sixth = $sixth;

        return $this;
    }

    /**
     * Get sixth
     *
     * @return integer
     */
    public function getSixth()
    {
        return $this->sixth;
    }

    /**
     * Set dateDrawn
     *
     * @param string $dateDrawn
     * @return Server
     */
    public function setDateDrawn($dateDrawn)
    {
        $this->dateDrawn = $dateDrawn;

        return $this;
    }

    /**
     * Get dateDrawn
     *
     * @return string
     */
    public function getDateDrawn()
    {
        return $this->dateDrawn;
    }

    /**
     * Set hasWinner
     *
     * @param integr $hasWinner
     * @return Server
     */
    public function setHasWinner($hasWinner)
    {
        $this->hasWinner = $hasWinner;

        return $this;
    }

    /**
     * Get hasWinner
     *
     * @return integer
     */
    public function getHasWinner()
    {
        return $this->hasWinner;
    }

    /**
     * Set numberOfWinners
     *
     * @param integer $numberOfWinners
     * @return Server
     */
    public function setNumberOfWinners($numberOfWinners)
    {
        $this->numberOfWinners = $numberOfWinners;

        return $this;
    }

    /**
     * Get numberOfWinners
     *
     * @return integer
     */
    public function getNumberOfWinners()
    {
        return $this->numberOfWinners;
    }
}

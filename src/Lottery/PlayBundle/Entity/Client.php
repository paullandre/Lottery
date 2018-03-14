<?php
/*src/Utility/SessionBundle/Entity/Client.php*/

namespace Lottery\PlayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Lottery\PlayBundle\Repository\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="ticket_number", type="string", length=255)
     */
    private $ticketNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="security_code", type="string", length=255)
     */
    private $securityCode;

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
     * @ORM\Column(name="date_time_bet", type="string", length=255)
     */
    private $dateTimeBet;

    /**
     * @var string
     *
     * @ORM\Column(name="date_time_draw", type="string", length=255)
     */
    private $dateTimeDraw;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_drawn", type="boolean")
     */
    private $isDrawn;


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
     * Set ticketNumber
     *
     * @param string $ticketNumber
     * @return Client
     */
    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;

        return $this;
    }

    /**
     * Get ticketNumber
     *
     * @return string
     */
    public function getTicketNumber()
    {
        return $this->ticketNumber;
    }

    /**
     * Set securityCode
     *
     * @param string $securityCode
     * @return Client
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    /**
     * Get securityCode
     *
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * Set first
     *
     * @param integer $first
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * Set dateTimeBet
     *
     * @param \DateTime $dateTimeBet
     * @return Client
     */
    public function setDateTimeBet($dateTimeBet)
    {
        $this->dateTimeBet = $dateTimeBet;

        return $this;
    }

    /**
     * Get dateTimeBet
     *
     * @return \DateTime
     */
    public function getDateTimeBet()
    {
        return $this->dateTimeBet;
    }

    /**
     * Set dateTimeDraw
     *
     * @param string $dateTimeDraw
     * @return Client
     */
    public function setDateTimeDraw($dateTimeDraw)
    {
        $this->dateTimeDraw = $dateTimeDraw;

        return $this;
    }

    /**
     * Get dateTimeDraw
     *
     * @return string
     */
    public function getDateTimeDraw()
    {
        return $this->dateTimeDraw;
    }

    /**
     * Set isDrawn
     *
     * @param boolean $isDrawn
     * @return Client
     */
    public function setIsDrawn($isDrawn)
    {
        $this->isDrawn = $isDrawn;

        return $this;
    }

    /**
     * Get isDrawn
     *
     * @return boolean
     */
    public function getIsDrawn()
    {
        return $this->isDrawn;
    }
}
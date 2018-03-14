<?php
/*src/Utility/SessionBundle/Entity/HasWinningNumbers.php*/

namespace Lottery\PlayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HasWinningNumbers
 *
 * @ORM\Table(name="has_winning_numbers")
 * @ORM\Entity(repositoryClass="Lottery\PlayBundle\Repository\HasWinningNumbersRepository")
 */
class HasWinningNumbers
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
     * @return HasWinningNumbers
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
     * @return HasWinningNumbers
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
     * Set dateTimeBet
     *
     * @param string $dateTimeBet
     * @return HasWinningNumbers
     */
    public function setDateTimeBet($dateTimeBet)
    {
        $this->dateTimeBet = $dateTimeBet;
    
        return $this;
    }

    /**
     * Get dateTimeBet
     *
     * @return string 
     */
    public function getDateTimeBet()
    {
        return $this->dateTimeBet;
    }

    /**
     * Set dateTimeDraw
     *
     * @param string $dateTimeDraw
     * @return HasWinningNumbers
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
}

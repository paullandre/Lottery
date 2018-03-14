<?php
/*src/Utility/SessionBundle/Entity/ClientDetails.php*/


namespace Lottery\PlayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientDetails
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lottery\PlayBundle\Entity\ClientDetailsRepository")
 */
class ClientDetails
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
     * @var boolean
     *
     * @ORM\Column(name="is_drawn", type="boolean")
     */
    private $isDrawn;

    /**
     * @var string
     *
     * @ORM\Column(name="date_drawn", type="string", length=255)
     */
    private $dateDrawn;

    /**
     * @var integer
     *
     * @ORM\Column(name="numbers_get", type="integer")
     */
    private $numbersGet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_price", type="boolean")
     */
    private $hasPrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_claimed", type="boolean")
     */
    private $hasClaimed;

    /**
     * @var string
     *
     * @ORM\Column(name="date_claimed", type="string", length=255)
     */
    private $dateClaimed;


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
     * @return ClientDetails
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
     * @return ClientDetails
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
     * Set isDrawn
     *
     * @param boolean $isDrawn
     * @return ClientDetails
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

    /**
     * Set dateDrawn
     *
     * @param string $dateDrawn
     * @return ClientDetails
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
     * Set numbersGet
     *
     * @param integer $numbersGet
     * @return ClientDetails
     */
    public function setNumbersGet($numbersGet)
    {
        $this->numbersGet = $numbersGet;
    
        return $this;
    }

    /**
     * Get numbersGet
     *
     * @return integer 
     */
    public function getNumbersGet()
    {
        return $this->numbersGet;
    }

    /**
     * Set hasPrice
     *
     * @param boolean $hasPrice
     * @return ClientDetails
     */
    public function setHasPrice($hasPrice)
    {
        $this->hasPrice = $hasPrice;
    
        return $this;
    }

    /**
     * Get hasPrice
     *
     * @return boolean 
     */
    public function getHasPrice()
    {
        return $this->hasPrice;
    }

    /**
     * Set hasClaimed
     *
     * @param boolean $hasClaimed
     * @return ClientDetails
     */
    public function setHasClaimed($hasClaimed)
    {
        $this->hasClaimed = $hasClaimed;
    
        return $this;
    }

    /**
     * Get hasClaimed
     *
     * @return boolean 
     */
    public function getHasClaimed()
    {
        return $this->hasClaimed;
    }

    /**
     * Set dateClaimed
     *
     * @param string $dateClaimed
     * @return ClientDetails
     */
    public function setDateClaimed($dateClaimed)
    {
        $this->dateClaimed = $dateClaimed;
    
        return $this;
    }

    /**
     * Get dateClaimed
     *
     * @return string 
     */
    public function getDateClaimed()
    {
        return $this->dateClaimed;
    }
}

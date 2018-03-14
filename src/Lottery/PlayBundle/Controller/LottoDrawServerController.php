<?php
/* src/Lottery/PlayBundle/Controller/LottoDrawServerController.php */

/**
 * @Controller for Picking the Six winning numbers
 * @Date 09/19/2013
 * @author Paul Andre Francisco
 */
namespace Lottery\PlayBundle\Controller;

Use Symfony\Bundle\FrameworkBundle\Controller\Controller;
Use Symfony\Component\Routing\Annotation\Route;
Use Lottery\PlayBundle\Entity\Server;
Use Lottery\PlayBundle\Entity\HasWinningNumbers;
Use Lottery\PlayBundle\Entity\Winner;

class LottoDrawServerController extends Controller
{
    public function getClientTable() { return "LotteryPlayBundle:Client"; }
        
    public function getServerTable() { return "LotteryPlayBundle:Server"; }
    
    public function getHasWinningNumbersTable() { return "LotteryPlayBundle:HasWinningNumbers"; }
    
    /**
     * @Route("/luckyPick")
     */
    public function luckPickAction()
    {
        $luck = mt_rand(1, 42);
        $this->firstNumber = $luck;

        $luck = mt_rand(1, 42);
        while($luck == $this->firstNumber)
        {
            $luck = "";
            $luck = mt_rand(1, 42);
        }
        $this->secondNumber = $luck;

        $luck = mt_rand(1, 42);
        while($luck == $this->firstNumber || $luck == $this->secondNumber)
        {
            $luck = "";
            $luck = mt_rand(1, 42);
        }
        $this->thirdNumber = $luck;

        $luck = mt_rand(1, 42);
        while($luck == $this->firstNumber || $luck == $this->secondNumber || $luck == $this->thirdNumber)
        {
            $luck = "";
            $luck = mt_rand(1, 42);
        }
        $this->fourthNumber = $luck;

        $luck = mt_rand(1, 42);
        while($luck == $this->firstNumber || $luck == $this->secondNumber || $luck == $this->thirdNumber || $luck == $this->fourthNumber)
        {
            $luck = "";
            $luck = mt_rand(1, 42);
        }
        $this->fifthNumber = $luck;

        $luck = mt_rand(1, 42);
        while($luck == $this->firstNumber || $luck == $this->secondNumber || $luck == $this->thirdNumber || $luck == $this->fourthNumber || $luck == $this->fifthNumber)
        {
            $luck = "";
            $luck = mt_rand(1, 42);
        }
        $this->sixthNumber = $luck;

        die($this->firstNumber .",". $this->secondNumber .",". $this->thirdNumber .",". $this->fourthNumber .",". $this->fifthNumber .",". $this->sixthNumber);
    }

    /**
     * @Route("/drawWinningNumbers")
     */
    public function drawWinningNumbersAction()
    {
        $i = mt_rand(1, 42);
        $this->firstNumber = $i;
        //$msg = " First ". $this->firstNumber ."<br />";

        $i = mt_rand(1, 42);
        while($i == $this->firstNumber)
        {
            $i = "";
            $i = mt_rand(1, 42);
        }

        $this->secondNumber = $i;
        //$msg .= " Second ". $this->secondNumber . "<br />";        

        $i = mt_rand(1, 42);
        while($i == $this->firstNumber || $i == $this->secondNumber)
        {
            $i = "";
            $i = mt_rand(1, 42);
        }

        $this->thirdNumber = $i;
        //$msg .= " Third ". $this->thirdNumber . "<br />";
        
        $i = mt_rand(1, 42);
        while($i == $this->firstNumber || $i == $this->secondNumber || $i == $this->thirdNumber)
        {
            $i = "";
            $i = mt_rand(1, 42);
        }

        $this->fourthNumber = $i;
        //$msg .= " Fourth ". $this->fourthNumber . "<br />";
        
        $i = mt_rand(1, 42);
        while($i == $this->firstNumber || $i == $this->secondNumber || $i == $this->thirdNumber || $i == $this->fourthNumber)
        {
            $i = "";
            $i = mt_rand(1, 42);
        }

        $this->fifthNumber = $i;
        //$msg .= " Fifth ". $this->fifthNumber . "<br />";
        
        $i = mt_rand(1, 42);
        while($i == $this->firstNumber || $i == $this->secondNumber || $i == $this->thirdNumber || $i == $this->fourthNumber || $i == $this->fifthNumber)
        {
            $i = "";
            $i = mt_rand(1, 42);
        }

        $this->sixthNumber = $i;
        //$msg .= " Sixth ". $this->sixthNumber . "<br />";
                
        try 
        {
            /*
            * INSERT RESULTS IN THE DATABASEs
            */
            
            $this->date = date('m/d/Y 20:00:00');
            
            $server = new Server();
            $server->setFirst($this->firstNumber);
            $server->setSecond($this->secondNumber);
            $server->setThird($this->thirdNumber);
            $server->setFourth($this->fourthNumber);
            $server->setFifth($this->fifthNumber);
            $server->setSixth($this->sixthNumber);
            $server->setDateDrawn($this->date);
            $server->setHasWinner(0);
            $server->setNumberOfWinners(0);
            
            $this->entityManager = $this->getDoctrine()->getManager();
            $this->entityManager->persist($server);
            $this->entityManager->flush();
        }
        catch (\QueryException $exc) 
        {
            echo $exc->getTraceAsString();
        }        
       
        die($this->firstNumber .",". $this->secondNumber .",". $this->thirdNumber .",". $this->fourthNumber .",". $this->fifthNumber .",". $this->sixthNumber);
    }
    
    /**
     * @Route("/drawNumbers")
     */
    public function drawNumbersAction()
    {
        return $this->render('LotteryPlayBundle:Lottery:drawWinningNumbers.html.twig');
    }
    
    /**
     * @Route("/clientCheckWinners")
     */    
    public function clientCheckWinnersAction()
    {
        $this->date = date('m/d/Y 20:00:00');
        $this->clientDate = date('m/d/Y') . " 8PM";               

        try
        {
            $this->entityManager = $this->getDoctrine()->getManager();
            $this->queryBuilder  = $this->entityManager->createQueryBuilder();
            $this->result        = $this->queryBuilder->select('s.first, s.second, s.third, s.fourth, s.fifth, s.sixth')
                 ->from(self::getServerTable(), 's')
                 ->where('s.dateDrawn = ?1')             
                 ->setParameter(1, $this->date)            
                 ->setMaxResults(1)
                 ->getQuery()
                 ->getResult();

            $this->one   = $this->result[0]['first'];
            $this->two   = $this->result[0]['second'];
            $this->three = $this->result[0]['third'];
            $this->four  = $this->result[0]['fourth'];
            $this->five  = $this->result[0]['fifth'];
            $this->six   = $this->result[0]['sixth'];
            
            //die(print_r($this->result));
            //echo $this->two; die();
            
            $this->numbers = array($this->one,$this->two,$this->three,$this->four,$this->five,$this->six);            
            
            /*SELECT SOME WINNING #'S*/
            $this->getSome = $this->queryBuilder->select('c.ticketNumber, c.securityCode, c.dateTimeBet, c.dateTimeDraw')
                 ->from(self::getClientTable(), 'c')
                 ->where('c.first IN (?1)')
                 ->orWhere('c.second IN (?2)')
                 ->orWhere('c.third IN (?3)')
                 ->orWhere('c.fourth IN (?4)')
                 ->orWhere('c.fifth IN (?5)')
                 ->orWhere('c.sixth IN (?6)')                 
                 ->andWhere('c.dateTimeDraw = ?7')                    
                 ->setParameter(1, $this->numbers)
                 ->setParameter(2, $this->numbers)
                 ->setParameter(3, $this->numbers)
                 ->setParameter(4, $this->numbers)
                 ->setParameter(5, $this->numbers)
                 ->setParameter(6, $this->numbers)
                 ->setParameter(7, $this->clientDate)
                 ->setMaxResults(2000)
                 ->getQuery()
                 ->getResult();                
            
            $this->counter = count($this->getSome);
            
            //die(print $this->counter);
            die(print_r($this->getSome));
                        
            if((int)$this->counter > 0)
            {
                for($i = 0; $i < (int)$this->counter; $i++)
                {
                    try 
                    {                        
                        $hasWinningNumbers = new HasWinningNumbers();
                        
                        $hasWinningNumbers->setTicketNumber($this->getSome[$i]['ticketNumber']);
                        $hasWinningNumbers->setSecurityCode($this->getSome[$i]['securityCode']);
                        $hasWinningNumbers->setDateTimeBet($this->getSome[$i]['dateTimeBet']);
                        $hasWinningNumbers->setDateTimeDraw($this->getSome[$i]['dateTimeDraw']);
                        
                        $this->entityManager = $this->getDoctrine()->getManager();
                        $this->entityManager->persist($hasWinningNumbers);
                        $this->entityManager->flush();        
                        
                        $this->em = $this->getDoctrine()->getManager();
                        $this->qb = $this->em->createQueryBuilder();
                        $this->query = $this->qb->update(self::getServerTable(), 's')
                             ->set('s.hasWinner', $this->qb->expr()->literal(1))
                             ->set('s.numberOfWinners', $this->qb->expr()->literal($this->counter))                             
                             ->where('s.dateDrawn = ?1')
                             ->setParameter(1, $this->date)
                             ->getQuery();
                        $this->query->execute();
                    }
                    catch (\QueryException $exc) 
                    {
                        echo $exc->getTraceAsString();
                    }
                }
            }
            else
            {
                die();
            } 
            die("Success");
        } 
        catch (\QueryException $exc) 
        {
            echo $exc->getTraceAsString();
        }        
    }
    
    /**
     * @Route("/exactWinners")
     */    
    public function exactWinnersAction()
    {
        $this->date = date('m/d/Y 20:00:00');
        $this->clientDate = date('m/d/Y') . " 8PM";               

        try
        {
            $this->entityManager = $this->getDoctrine()->getManager();
            $this->queryBuilder  = $this->entityManager->createQueryBuilder();
            $this->result        = $this->queryBuilder->select('s.first, s.second, s.third, s.fourth, s.fifth, s.sixth')
                 ->from(self::getServerTable(), 's')
                 ->where('s.dateDrawn = ?1')             
                 ->setParameter(1, $this->date)            
                 ->setMaxResults(10)
                 ->getQuery()
                 ->getResult();

            $this->one   = $this->result[0]['first'];
            $this->two   = $this->result[0]['second'];
            $this->three = $this->result[0]['third'];
            $this->four  = $this->result[0]['fourth'];
            $this->five  = $this->result[0]['fifth'];
            $this->six   = $this->result[0]['sixth'];
            
            $this->numbers = array($this->one,$this->two,$this->three,$this->four,$this->five,$this->six);
            
            /*SELECT THE EXACT WINNING #'S*/
            $this->getAll = $this->queryBuilder->select('c.ticketNumber, c.securityCode, c.dateTimeBet, c.dateTimeDraw')
                 ->from(self::getClientTable(), 'c')
                 ->where('c.first IN (?1)')
                 ->andWhere('c.second IN (?2)')
                 ->andWhere('c.third IN (?3)')
                 ->andWhere('c.fourth IN (?4)')
                 ->andWhere('c.fifth IN (?5)')
                 ->andWhere('c.sixth IN (?6)')                 
                 ->andWhere('c.dateTimeDraw = ?7')             
                 ->setParameter(1, $this->numbers)
                 ->setParameter(2, $this->numbers)
                 ->setParameter(3, $this->numbers)
                 ->setParameter(4, $this->numbers)
                 ->setParameter(5, $this->numbers)
                 ->setParameter(6, $this->numbers)                    
                 ->setParameter(7, $this->clientDate)
                 ->setMaxResults(200)
                 ->getQuery()
                 ->getResult();
            
            $this->counter = count($this->getAll);
            
            if((int)$this->counter > 0)
            {
                for($i = 0; $i < (int)$this->counter; $i++)
                {
                    try 
                    {    
                        /*IF THIS EXSTS IN THE TABLE has_winning_numbers: DELETE IT*/
                        $this->delManager = $this->getDoctrine()->getManager();
                        $this->delBuilder  = $this->delManager->createQueryBuilder()
                            ->delete(self::getHasWinningNumbersTable(), "has")
                            ->where('has.ticketNumber = ?1')
                            ->andWhere('has.securityCode = ?2')
                            ->setParameter(1, $this->getAll[$i]['ticketNumber'])
                            ->setParameter(2, $this->getAll[$i]['securityCode'])
                            ->getQuery();
                       $this->delBuilder->execute();
            
                        $Winner = new Winner();
                        
                        $Winner->setTicketNumber($this->getAll[$i]['ticketNumber']);
                        $Winner->setSecurityCode($this->getAll[$i]['securityCode']);
                        $Winner->setDateTimeBet($this->getAll[$i]['dateTimeBet']);
                        $Winner->setDateTimeDraw($this->getAll[$i]['dateTimeDraw']);
                        
                        $this->entityManager = $this->getDoctrine()->getManager();
                        $this->entityManager->persist($Winner);
                        $this->entityManager->flush();         
                        
                        $this->em = $this->getDoctrine()->getManager();
                        $this->qb = $this->em->createQueryBuilder();
                        $this->query = $this->qb->update(self::getServerTable(), 's')
                             ->set('s.hasWinner', $this->qb->expr()->literal(1))
                             ->set('s.numberOfWinners', $this->qb->expr()->literal($this->counter))                             
                             ->where('s.dateDrawn = ?1')
                             ->setParameter(1, $this->date)
                             ->getQuery();
                        $this->query->execute();
                    }
                    catch (\QueryException $exc) 
                    {
                        echo $exc->getTraceAsString();
                    }
                }
            }
            else
            {
                die();
            }
            
            die("Success");
        } 
        catch (\QueryException $exc) 
        {
            echo $exc->getTraceAsString();
        }        
    }
}
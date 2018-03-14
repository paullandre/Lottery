<?php
/* src/Lottery/PlayBundle/Controller/LottoGameServerController.php */

/**
 * @Checks the entry from Frontend and save to the database
 * @Date 09/19/2013
 * @author Paul Andre Francisco
 */
namespace Lottery\PlayBundle\Controller;

Use Symfony\Bundle\FrameworkBundle\Controller\Controller;
Use Symfony\Component\Routing\Annotation\Route;
Use Lottery\PlayBundle\Entity\Client;

class LottoGameServerController extends Controller
{
    /*
     * Return the table object
     * Client
     */
    public function getClientTable() { return "LotteryPlayBundle:Client"; }

    /**
     * @Route("/getLatestBet")
     */
    public function getLatestBetAction()
    {
        $request = $this->getRequest();

        $this->ticketNumber  = $request->request->get('ticket_number');
        $this->securityCode  = $request->request->get('security_code');

        $this->entityManager = $this->getDoctrine()->getManager();
        $this->queryBuilder  = $this->entityManager->createQueryBuilder();
        $this->result        = $this->queryBuilder->select('c.id, c.ticketNumber, c.securityCode, c.first, c.second, c.third, c.fourth, c.fifth, c.sixth, c.dateTimeBet, c.dateTimeDraw, c.isDrawn')
             ->from(self::getClientTable(), 'c')
             ->where('c.ticketNumber = ?1')
             ->orWhere('c.securityCode = ?2')
             ->setParameter(1, $this->ticketNumber)
             ->setParameter(2, $this->securityCode)
             ->addOrderBy('c.id')
             ->setMaxResults(1)
             ->getQuery()
             ->getResult();
        
        //die(var_dump($this->result));
        
        $this->countResult = count($this->result);

        $this->jsonResult  = json_encode($this->result);
       
        die($this->result[0]['id'] .",". $this->result[0]['ticketNumber'] .",".
            $this->result[0]['securityCode'] .",". $this->result[0]['first'] .",". $this->result[0]['second'] .",".
            $this->result[0]['third'] .",". $this->result[0]['fourth'] .",". $this->result[0]['fifth'] .",". $this->result[0]['sixth'] .",".
            $this->result[0]['dateTimeBet'] .",". $this->result[0]['dateTimeDraw'] .",". $this->result[0]['isDrawn']);
    }

    /**
     * @Route("/lottoBet")
     */
    public function lottoBetAction()
    {
        return $this->render('LotteryPlayBundle:Lottery:lottoBet.html.twig');
    }

    /**
     * @Route("/validateAll")
     */
    public function validateAllAction()
    {      
        try
        {
            gc_enable();

            /*SET TO MANILA TIME*/
            date_default_timezone_set('Asia/Manila'); // 9 HOURS LATE

            /*
             * VALIDATE TIME
             */            
                    
            $this->clientDate = date('m/d/Y h:i:s a');
            $this->space = explode(" ", $this->clientDate);
            $this->amPm = $this->space[2];                   
            
            $this->format = '%H';
            $this->strf = strftime($this->format);
            $this->strf = floatval($this->strf);
            $this->strf += 9;
            
            if(($this->amPm == "am") && ($this->strf > 12))
            {
                $this->strf -= 9;
            }

            $this->strf = $this->strf < 7 ? die("Lottery bet starts at 7AM...") : $this->strf;
            $this->strf = $this->strf > 20 ? die("Lottery bet ends at 8PM...") : $this->strf;

            /*
             * END VALIDATE TIME
             */
            
            $request = $this->getRequest();

            $this->first  = $request->request->get('one');
            $this->second = $request->request->get('two');
            $this->third  = $request->request->get('three');
            $this->fourth = $request->request->get('four');
            $this->fifth  = $request->request->get('five');
            $this->sixth  = $request->request->get('six');

            if(
              ("" == $this->first || null == $this->first) ||
              ("" == $this->second || null == $this->second) ||
              ("" == $this->third || null == $this->third) ||
              ("" == $this->fourth || null == $this->fourth) ||
              ("" == $this->fifth || null == $this->fifth) ||
              ("" == $this->sixth || null == $this->sixth))
            {
                die("Lacking an entry.");

            }
            else if(
              ("" == $this->first || null == $this->first) &&
              ("" == $this->second || null == $this->second) &&
              ("" == $this->third || null == $this->third) &&
              ("" == $this->fourth || null == $this->fourth) &&
              ("" == $this->fifth || null == $this->fifth) &&
              ("" == $this->sixth || null == $this->sixth))
            {
                die("No numbers detected.. Please javascript if disabled...");
            }
            else
            {
                try
                {
                    $this->date = date('m/d/Y');   
                    
                    $this->clientDate = date('m/d/Y h:i:s a');
                    $this->space = explode(" ", $this->clientDate);
                    
                    $this->amPm = $this->space[2];                    
                    
                    $this->time = explode(":", $this->space[1]);
                    $this->hour = floatval($this->time[0]) + 9;
                    $this->min = $this->time[1];
                    $this->sec = $this->time[2];
                    
                    if(($this->amPm == "am") && ($this->hour > 12))
                    {
                        $this->hour -= 9;
                    }
                    
                    $this->arrTime = array($this->hour,$this->min, $this->sec);        
                    $this->time = implode(":", $this->arrTime);
                    $this->arrDateTime = array($this->space[0], $this->time);
                    $this->correct = implode(" ", $this->arrDateTime);                                        
                    
                    $this->securityCode = str_shuffle($this->date . $this->first . $this->third . $this->fifth);
                    $this->ticketNumber = str_shuffle($this->date . $this->second . $this->fourth . $this->sixth);

                    $this->securityCode = str_replace(":", "-", $this->securityCode);
                    $this->securityCode = str_replace("/", "-", $this->securityCode);
                    $this->securityCode = str_replace(" ", "-", $this->securityCode);
                    $this->securityCode = substr($this->securityCode, 0 ,10);

                    $this->ticketNumber = str_replace(":", "-", $this->ticketNumber);
                    $this->ticketNumber = str_replace("/", "-", $this->ticketNumber);
                    $this->ticketNumber = str_replace(" ", "-", $this->ticketNumber);
                    $this->ticketNumber = substr($this->ticketNumber, 0 ,10);

                    $client = new Client();

                    $client->setTicketNumber($this->ticketNumber);
                    $client->setSecurityCode($this->securityCode);
                    $client->setFirst($this->first);
                    $client->setSecond($this->second);
                    $client->setThird($this->third);
                    $client->setFourth($this->fourth);
                    $client->setFifth($this->fifth);
                    $client->setSixth($this->sixth);
                    //$client->setDateTimeBet(date('m/d/Y h:i:s'));
                    $client->setDateTimeBet($this->correct);
                    $client->setDateTimeDraw($this->date . " 8PM");
                    $client->setIsDrawn(0);

                    $this->entityManager = $this->getDoctrine()->getManager();
                    $this->entityManager->persist($client);
                    $this->entityManager->flush();
                }
                catch (\QueryException $exc)
                {
                    echo $exc->getTraceAsString();
                }
            }

            gc_collect_cycles();
            gc_disable();

            die($this->ticketNumber . "," . $this->securityCode);
        }
        catch (Exception $exc)
        {
            echo $exc->getTraceAsString();
        }
    }
}
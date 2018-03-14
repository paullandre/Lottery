<?php
/* src/Lottery/PlayBundle/Controller/LottoCheckDrawController.php */

/**
 * @Description: Client checks the winning numbers by
 *               searching from ticket number or security code
 * @Date:        10/07/2013
 * @author Paul Andre Francisco
 */

namespace Lottery\PlayBundle\Controller;

Use Symfony\Bundle\FrameworkBundle\Controller\Controller;
Use Symfony\Component\Routing\Annotation\Route;
//Use Lottery\PlayBundle\Entity\Client;

class LottoCheckDrawController extends Controller
{
    /**
     * @Route("/renderWinningNumberTemplate")
     */
    public function renderTemplateAction()
    {
        return $this->render('LotteryPlayBundle:Lottery:checkWinningNumbers.html.twig');
    }

    /**
     * @Route("/getWinningNumbers")
     */
    public function checkWinningNumbersAction()
    {
        $request = $this->getRequest();

        $this->ticketNumber  = $request->request->get('ticket_number');
        $this->securityCode  = $request->request->get('security_code');
    }
}
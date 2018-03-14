<?php
/* src/Lottery/PlayBundle/Controller/LottoGameClientController.php */

/**
 * @Description Returns the template for client
 * @Date 09/19/2013
 * @author Paul Andre Francisco
 */
namespace Lottery\PlayBundle\Controller;

Use Symfony\Bundle\FrameworkBundle\Controller\Controller;
Use Symfony\Component\Routing\Annotation\Route;
Use Lottery\PlayBundle\Entity\Client;

class LottoGameClientController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        return $this->render('LotteryPlayBundle:Lottery:index.html.twig');
    }
}
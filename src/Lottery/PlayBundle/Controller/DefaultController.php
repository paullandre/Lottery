<?php

namespace Lottery\PlayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LotteryPlayBundle:Default:index.html.twig', array('name' => $name));
    }
}

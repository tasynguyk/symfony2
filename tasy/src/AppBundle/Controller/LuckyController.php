<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/{count}", name="lucky")
     */
    public function indexAction($count = 1)
    {
        
        $number = rand(0,100);
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),'number'=>$count));
    }
}

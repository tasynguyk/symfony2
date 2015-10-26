<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class zController extends Controller
{
    /**
     * @Route("/home")
     */
    public function indexAction(Request $request)
    {
        
        $z = '123';
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'name' => $z
        ));
    }
    
    /**
     * @Route("/home/z")
     */
    public function zAction()
    {
        echo 'sfdsfds';
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'name' => 'namezzzz'
        ));
    }
}

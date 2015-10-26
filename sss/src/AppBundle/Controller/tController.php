<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class tController extends Controller
{
    /**
     * @Route("/thu")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'name' => 'namettt'
        ));
    }
    /**
     * @Route("/thu/z")
     */
    public function zAction(Request $request)
    {
        echo 'sfdsfds';
    }
}

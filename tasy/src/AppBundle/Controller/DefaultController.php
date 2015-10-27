<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RequestContext;

class DefaultController extends Controller
{
    /**
     * @Route("/login", name="homepage")
     * 
     */
    public function IndexAction(Request $request)
    { 
       if($this->get('session')->get('islogin'))
       {
           echo 'dfgdf';
           return $this->redirect('/profile');
       }
       $name = $request->request->get('name');
       $pass = md5($request->request->get('pass')); 
       
       $em = $this->getDoctrine()->getEntityManager();
       $connection = $em->getConnection();
       if($request->request->get('submit'))
       {
            $statement = $connection->prepare("SELECT * FROM user where username='$name' and password='$pass'");
            $statement->bindValue('id', 123);
            $statement->execute();
            $results = $statement->fetchAll();
            $request  = $this->getRequest();
            if(count($results)>0)
            {
                $this->get('session')->set('islogin',1);
                $this->get('session')->set('username',$results[0]["username"]);
                return $this->redirect('/profile');
            }
       }
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/logout", name="logou")
     * 
     */
    public function LogoutAction()
    {
        session_destroy();
        return $this->redirect('/login');
    }
    
    /**
     * @Route("/profile", name="profile")
     * 
     */
    public function Profile()
    {
       if(!$this->get('session')->get('islogin'))
       {
           return $this->redirect('/login');
       }
       else
       {
           return $this->render('default/profile.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
       }
    }
}

<?php

namespace Ipf\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IpfUserBundle:Default:index.html.twig', array('name' => $name));
    }
}

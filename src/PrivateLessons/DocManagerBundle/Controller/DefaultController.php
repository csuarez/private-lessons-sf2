<?php

namespace PrivateLessons\DocManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $documents = $this->getDoctrine()
                    ->getRepository('PrivateLessonsDocManagerBundle:Document')
                    ->findAll();

        return(array('documents' => $documents));
    }
}

<?php

namespace PrivateLessons\DocManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DocumentController extends Controller
{
    /**
     * @Route("/documents", name="document_list")
     * @Template()
     */
    public function listAction()
    {
        $documents = $this->getDoctrine()
                    ->getRepository('PrivateLessonsDocManagerBundle:Document')
                    ->findAll();

        return(array('documents' => $documents));
    }
}

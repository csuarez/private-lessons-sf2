<?php

namespace PrivateLessons\DocManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthorController extends Controller
{
    /**
     * @Route("/authors", name="author_list")
     * @Template()
     */
    public function listAction()
    {
        $authors = $this->getDoctrine()
                    ->getRepository('PrivateLessonsDocManagerBundle:Author')
                    ->findAll();

        return(array('authors' => $authors));
    }
}

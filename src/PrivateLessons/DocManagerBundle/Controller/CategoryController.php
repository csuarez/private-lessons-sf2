<?php

namespace PrivateLessons\DocManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{
    /**
     * @Route("/categories", name="category_list")
     * @Template()
     */
    public function listAction()
    {
        $categories = $this->getDoctrine()
                    ->getRepository('PrivateLessonsDocManagerBundle:Category')
                    ->findAll();

        return(array('categories' => $categories));
    }
}

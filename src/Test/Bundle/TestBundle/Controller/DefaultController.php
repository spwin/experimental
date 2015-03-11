<?php

namespace Test\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;	
use Test\Bundle\TestBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
		$em = $this->getDoctrine()->getManager();

		$post = $em->getRepository('TestTestBundle:Post')->find(1);

				
        return array('name' => $post->getId());
    }
}

<?php

namespace Test\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;	
use Test\Bundle\TestBundle\Entity\Post;
use Test\Bundle\TestBundle\Entity\Messages;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $limit = 30;
        $messages = $em->getRepository('TestTestBundle:Messages')->findBy(
            array(),
            array('date' => 'desc'),
            $limit
        );

        $username = 'Testuser';
        $message = new Messages();
        $form = $this->createFormBuilder($message)
            ->add('user', 'hidden',array('data' => $username))
            ->add('message', 'text')
            ->add('save', 'submit', array('label' => 'Send'))
            ->getForm();
        return array('messages' => $messages, 'form' => $form->createView());
    }

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function helloAction($name)
    {
		$em = $this->getDoctrine()->getManager();

		$post = $em->getRepository('TestTestBundle:Post')->find(1);

				
        return array('name' => $post->getId());
    }
}

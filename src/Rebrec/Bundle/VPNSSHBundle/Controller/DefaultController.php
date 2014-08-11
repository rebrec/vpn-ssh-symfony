<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    
    /**
    * @Route("/")
    * @Template()
    */
    public function indexAction()
    {
        return $this->render('RebrecVPNSSHBundle:Default:index.html.twig');
    }

    /**
    * @Route("/test")
    * @Template()
    */
    public function testAction(Request $request)
    {
        $data = array();
        $form = $this->createFormBuilder($data)
                ->add('category', 'choice', 
                    array('choices' => array(
                    'oui' => 'coucou',
                    'non' => 'nada',
                )))
                ->add('Suivant', 'submit')
                ->getForm();
        
        if ($request->isMethod('POST')) {
            
            $form->bind($request);
            $data = $form->getData();
        }
        
        
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($protocol);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_protocol_add'));
        }
        return $this->render('RebrecVPNSSHBundle:Protocol:add.html.twig', array(
            'form' => $form->createView(),
        ));

        
        return $this->render('RebrecVPNSSHBundle:Default:index.html.twig');
    }

    
    
}

<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Rebrec\Bundle\VPNSSHBundle\Entity\Protocol;
use Rebrec\Bundle\VPNSSHBundle\Form\ProtocolType;

class ProtocolController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $protocol = new Protocol();
        $form = $this->createForm(new ProtocolType(), $protocol);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($protocol);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_protocol_list'));
        }
        return $this->render('RebrecVPNSSHBundle:Protocol:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/list")
     * @Route("/")
     * @Template()
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Protocol');
        $arrProtocols = $repository->findAll();
       // return var_dump($arrTickets);
        return $this->render('RebrecVPNSSHBundle:Protocol:list.html.twig', array('arrProtocols' => $arrProtocols));

    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction()
    {
        return array(
                // ...
            );    }

}

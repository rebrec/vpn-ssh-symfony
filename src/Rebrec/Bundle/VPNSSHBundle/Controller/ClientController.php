<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;



class ClientController extends Controller
{
    /**
     * @Route("/register/{key}")
     * @Template()
     */
    public function registerAction(Request $request, $key)
    {
        $ipaddress = $request->getClientIp();
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Ticket');
        
        $ticket = $repository->findOneBy(array('auth_key' => $key, 'clientIp' => 'empty'));
        if (null === $ticket) {
            $error = true;
        }
        else
        {
            $ticket->setClientIp($ipaddress);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
            $error = false;
        
        }        
        return $this->render('RebrecVPNSSHBundle:Client:register.html.twig', array(
            'error' => $error,
            'ipaddress' => $ipaddress,
            'auth_key' => $key)
        );
    }

    /**
     * @Route("/settings")
     * @Template()
     */
    public function settingsAction()
    {
        return array(
                // ...
            );    }

}

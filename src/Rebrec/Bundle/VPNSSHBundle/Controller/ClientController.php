<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;


use Rebrec\Bundle\VPNSSHBundle\Utils\Shell\UserProfile;
use Rebrec\Bundle\VPNSSHBundle\Utils\Shell\SSHKeyPair;
use Rebrec\Bundle\VPNSSHBundle\Utils\Shell\SSHAuthKey;




class ClientController extends Controller
{
    /**
     * @Route("/register/{key}")
     * @Template()
     */
    public function registerAction(Request $request, $key)
    {
        $error = true;
        $ipaddress = $request->getClientIp();
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Ticket');
        
        $ticket = $repository->findOneBy(array('auth_key' => $key, 'clientIp' => 'empty'));
        if (null === $ticket) {
            $error = true;
        } else {
            $u = new UserProfile($ticket->getUsername());
            $k = new SSHKeyPair($ticket->getAuthKey());
            $a = new SSHAuthKey($k->GetPubKey(), $ticket->getProfile()->getTunnels());
            $u->AddAuthKey($a);
            
            
            $ticket->setFirstLogon(new \DateTime());
            $ticket->setPublicKey($k->GetPubKey());
            $ticket->setPrivateKey($k->GetPrivKey());
            $ticket->setPpkKey($k->GetPPKKey());
            
            $ticket->setClientIp($ipaddress);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
            $error = false;        
        }
        return $this->render('RebrecVPNSSHBundle:Client:register.html.twig', array(
            'error' => $error,
            'ipaddress' => $ipaddress,
            'auth_key' => $key
        ));
    }

    /**
     * @Route("/settings")
     * @Template()
     */
    public function settingsAction(Request $request)
    {
        $error = true;
        $ipaddress = $request->getClientIp();
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Ticket');
        
        $ticket = $repository->findOneBy(array('clientIp' => $ipaddress));
        if (null === $ticket) {
            $jsonData['msg'] = 'Invalid Session!';
        } else {
            
            $jsonData['msg'] = 'ok';
            $jsonData['host'] = $ticket->getSshHostIp();
            $jsonData['port'] = $ticket->getSshHostPort();
            $jsonData['session'] = $ticket->getAuthKey();
            $jsonData['user'] = $ticket->getUsername();
            $jsonData['private_key'] = $ticket->getPpkKey();
            $jsonData['tunnels'] = $ticket->getProfile()->getTunnelsToArray(); ////// <========== FAUT CHANGER CA METTRE DANS TUNNEL UN TRUC QUI GENERE LA LISTE COMME IL AFUT

            $response = new \Symfony\Component\HttpFoundation\Response(json_encode($jsonData));
            return $response;


        }
    }
        //return false;

}

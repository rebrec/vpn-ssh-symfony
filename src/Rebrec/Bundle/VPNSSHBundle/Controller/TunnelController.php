<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel;
use Rebrec\Bundle\VPNSSHBundle\Form\TunnelType;

class TunnelController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $tunnel = new Tunnel();
        $form = $this->createForm(new TunnelType(), $tunnel);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($tunnel);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_tunnel_add'));
        }
        return $this->render('RebrecVPNSSHBundle:Tunnel:add.html.twig', array(
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
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Tunnel');
        
        $arrTunnels = $repository->findAll();
        //var_dump($arrTunnels);
        return $this->render('RebrecVPNSSHBundle:Tunnel:list.html.twig', array('arrTunnels' => $arrTunnels));
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

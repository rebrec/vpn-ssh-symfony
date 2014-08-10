<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile;
use Rebrec\Bundle\VPNSSHBundle\Form\TunnelProfileType;


class TunnelProfilesController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $tunnelprofile = new TunnelProfile();
        $form = $this->createForm(new TunnelProfileType(), $tunnelprofile);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($tunnelprofile);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_tunnelprofiles_add'));
        }
        return $this->render('RebrecVPNSSHBundle:TunnelProfile:add.html.twig', array(
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
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:TunnelProfile');
        
        $arrTunnelProfiles = $repository->findAll();
        //var_dump($arrTunnels);
        return $this->render('RebrecVPNSSHBundle:TunnelProfile:list.html.twig', array('arrTunnelProfiles' => $arrTunnelProfiles));
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

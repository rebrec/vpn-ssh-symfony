<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RebrecVPNSSHBundle:Default:index.html.twig');
    }

    
    public function creationConfirmationAction($id)
    {
        return $this->render('RebrecVPNSSHBundle:Default:creationConfirmation.html.twig', array(
            'id' => $id,
        ));
    
    }
    
}

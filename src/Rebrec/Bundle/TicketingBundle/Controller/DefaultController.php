<?php

namespace Rebrec\Bundle\TicketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RebrecTicketingBundle:Default:index.html.twig');
    }

    
    public function creationConfirmationAction($id)
    {
        return $this->render('RebrecTicketingBundle:Default:creationConfirmation.html.twig', array(
            'id' => $id,
        ));
    
    }
    
}

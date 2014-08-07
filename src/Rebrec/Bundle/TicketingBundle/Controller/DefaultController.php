<?php

namespace Rebrec\Bundle\TicketingBundle\Controller;

use Rebrec\Bundle\TicketingBundle\Entity\Ticket;
use Rebrec\Bundle\TicketingBundle\Form\TicketType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RebrecTicketingBundle:Default:index.html.twig', array('name' => $name));
    }

    
    public function creationConfirmationAction($id)
    {
        return $this->render('RebrecTicketingBundle:Default:creationConfirmation.html.twig', array(
            'id' => $id,
        ));
    
    }
    
}

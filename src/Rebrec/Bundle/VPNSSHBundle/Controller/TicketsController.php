<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Rebrec\Bundle\VPNSSHBundle\Entity\Ticket;
use Rebrec\Bundle\VPNSSHBundle\Form\TicketType;
use Symfony\Component\HttpFoundation\Request;

class TicketsController extends Controller
{
    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $ticket = new Ticket();
        $form = $this->createForm(new TicketType(), $ticket);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_tickets_new', array(
                'id' => $ticket->getAuthkey()
            )));
        }
        return $this->render('RebrecVPNSSHBundle:Tickets:new.html.twig', array(
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
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Ticket');
        
        $arrTickets = $repository->findAll();
       // return var_dump($arrTickets);
        return $this->render('RebrecVPNSSHBundle:Tickets:list.html.twig', array('arrTickets' => $arrTickets));
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

<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Rebrec\Bundle\VPNSSHBundle\Entity\Ticket;
use Rebrec\Bundle\VPNSSHBundle\Form\TicketType;
use Rebrec\Bundle\VPNSSHBundle\Utils\Shell\UserProfile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketsController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
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
            return $this->redirect($this->generateUrl('rebrec_vpnssh_tickets_list'));
        }
        return $this->render('RebrecVPNSSHBundle:Tickets:add.html.twig', array(
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
     * @Route("/delete/{key}")
     * @Template()
     */
    public function deleteAction($key)
    {
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Ticket');
        if (null !== $key)
        {
            $ticket = $repository->findOneBy(array('auth_key' => $key));
            if (null === $ticket) {
                $error = true;
            }
            else        {
                $username = $ticket->getUsername();
                echo "Trying to remove profile of username $username ...</br>";
                $u = new UserProfile($username);
                echo "Trying to remove profile of username $username ...</br>";
                echo "Profile directory : " . $u->GetProfilePath();
                $u->DelUserProfile();
                echo "Trying to remove session $key ...</br>";
                $em = $this->getDoctrine()->getManager();
                $em->remove($ticket);                    
                $em->flush();
                $error = false;
            }        
        }
        
        
        
        
        
        
        return $this->redirect($this->generateUrl('rebrec_vpnssh_tickets_list'));
    }
}

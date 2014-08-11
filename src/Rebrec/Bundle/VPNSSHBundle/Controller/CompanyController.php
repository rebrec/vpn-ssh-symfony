<?php

namespace Rebrec\Bundle\VPNSSHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Rebrec\Bundle\VPNSSHBundle\Entity\Company;
use Rebrec\Bundle\VPNSSHBundle\Form\CompanyType;

class CompanyController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $company = new Company();
        $form = $this->createForm(new CompanyType(), $company);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving etc...
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();
            
            //$request->getSession()->getFlashBag()->set('notice', 'OK!');
            return $this->redirect($this->generateUrl('rebrec_vpnssh_company_add'));
        }
        return $this->render('RebrecVPNSSHBundle:Company:add.html.twig', array(
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
        $repository = $this->getDoctrine()->getRepository('RebrecVPNSSHBundle:Company');
        
        $arrCompanys = $repository->findAll();
        //var_dump($arrCompanys);
        return $this->render('RebrecVPNSSHBundle:Company:list.html.twig', array('arrCompanys' => $arrCompanys));
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

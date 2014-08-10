<?php

namespace Rebrec\Bundle\VPNSSHBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class TunnelProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('tunnels', 'entity', array(
                'class' => 'RebrecVPNSSHBundle:Tunnel',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('Valider', 'submit') 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rebrec_bundle_vpnsshbundle_tunnelprofile';
    }
}

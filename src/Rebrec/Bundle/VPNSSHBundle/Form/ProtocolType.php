<?php

namespace Rebrec\Bundle\VPNSSHBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProtocolType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('Valider', 'submit')          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rebrec\Bundle\VPNSSHBundle\Entity\Protocol'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rebrec_bundle_vpnsshbundle_protocol';
    }
}

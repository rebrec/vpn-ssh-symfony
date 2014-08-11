<?php

namespace Rebrec\Bundle\VPNSSHBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class TicketType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer', 'entity', array(
                'class' => 'RebrecVPNSSHBundle:Customer',
                'property' => 'FullName',
                'multiple' => false,
            ))
            ->add('description')
            ->add('profile')
            ->add('beginValidDate', 'date', array(
                'label' => 'Date de Début',
                'format' => 'yyyy/MM/dd HH:mm',
                'widget' => 'single_text',
                'attr' => array('class'=>'datetimepicker'),
            ))
            ->add('endValidDate', 'date', array(
                'label' => 'Date de Fin',
                'format' => 'yyyy/MM/dd HH:mm',
                'widget' => 'single_text',
                'attr' => array('class'=>'datetimepicker'),
            ))
            ->add('allowedHours', 'integer', array(
                'label' => 'Nombre d\'heures autorisées',
            ))
            ->add('clientIp','text', array(
                'required' => false,                
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
            'data_class' => 'Rebrec\Bundle\VPNSSHBundle\Entity\Ticket'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rebrec_bundle_vpnsshbundle_ticket';
    }
}

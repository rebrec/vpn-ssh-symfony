<?php

namespace Rebrec\Bundle\TicketingBundle\Form;

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
            ->add('description')
            ->add('profile')
            ->add('beginValidDate')
            ->add('endValidDate')
            ->add('allowedTime')
            ->add('clientIp')
            ->add('sshHostIp')
            ->add('sshHostPort')
            ->add('username')
            ->add('auth_key')         
            ->add('publicKey')
            ->add('privateKey')
            ->add('ppkKey')
            ->add('Valider', 'submit')
        ;

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rebrec\Bundle\TicketingBundle\Entity\Ticket'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rebrec_bundle_ticketingbundle_ticket';
    }
}

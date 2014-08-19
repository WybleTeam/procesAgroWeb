<?php

namespace ICA\TramiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MotivoIdentificacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreMotivo','text',array(
                'attr'=>array('class'=>'form-control'),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ICA\TramiteBundle\Entity\MotivoIdentificacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ica_tramitebundle_motivoidentificacion';
    }
}

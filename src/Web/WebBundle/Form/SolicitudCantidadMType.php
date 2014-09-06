<?php

namespace Web\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SolicitudCantidadMType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motivoIdentificacion',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly'),
                'empty_value'=>'Escoge un motivo'
            ))
            ->add('cantidad',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            
           // ->add('solicitudMantenimiento',null,array(
           //     'attr'=>array('class'=>'form-control')
           // ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\WebBundle\Entity\SolicitudCantidadMotivo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_webbundle_solicitudcantidadm';
    }
}

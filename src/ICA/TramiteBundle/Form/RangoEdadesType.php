<?php

namespace ICA\TramiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RangoEdadesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreRango','text',array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('codigoMotivo','text',array(
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
            'data_class' => 'ICA\TramiteBundle\Entity\RangoEdades'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ica_tramitebundle_rangoedades';
    }
}

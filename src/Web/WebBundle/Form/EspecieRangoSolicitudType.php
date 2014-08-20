<?php

namespace Web\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EspecieRangoSolicitudType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('rangoEdades',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('especieAnimal',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            //->add('solicitudMantenimiento',null,array(
            //    'attr'=>array('class'=>'form-control')
            //))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\WebBundle\Entity\EspecieRangoSolicitud'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_webbundle_especierangosolicitud';
    }
}

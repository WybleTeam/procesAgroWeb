<?php

namespace Proces\OfertaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PasosOfertaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloPasos','text',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('descripcionPaso','textarea',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('urlPaso','url',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('ofertaInstitucional',null,array(
                'attr'=>array('class'=>'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proces\OfertaBundle\Entity\PasosOferta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_ofertabundle_pasosoferta';
    }
}

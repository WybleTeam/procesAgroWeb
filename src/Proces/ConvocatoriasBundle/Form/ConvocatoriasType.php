<?php

namespace Proces\ConvocatoriasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConvocatoriasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloConvocatoria','text',array(
                    'attr'=>array('class'=>'form-control', 'maxlength'=>'80'),
                    'label'=>'Título de Convocatoria',
                    
            ))
            ->add('descripcion','textarea',array(
                    'attr'=>array('class'=>'form-control', 'maxlength'=>'200'),
                    'label'=>'Descripción'
                
            ))
             ->add('urlAudio','url', array(
                    'attr'=>array('class'=>'form-control', 'maxlength'=>'300'),
                    'label'=>'Url del audio',
                    'required'=>false,
                
            ))    
            ->add('urlConvocatoria','url', array(
                    'attr'=>array('class'=>'form-control', 'maxlength'=>'300'),
                    'label'=>'Url de la convocatoria'
                
            ))
            ->add('descripcionLarga','textarea',array(
                    'attr'=>array('class'=>'form-control', 'maxlength'=>'400'),
                    'label'=>'Descripción Larga'
                
            ))
           // ->add('usuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proces\ConvocatoriasBundle\Entity\Convocatorias'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_convocatoriasbundle_convocatorias';
    }
}

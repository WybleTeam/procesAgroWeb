<?php

namespace Proces\OficinasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OficinasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreOficina','text',array(
                    'attr'=>array('class'=>'form-control'),
                    'label'=>'Nombre Oficina'
                
            ))
            ->add('direccionOficina','text',array(
                    'attr'=>array('class'=>'form-control'),
                    'label'=>'Dirección Oficina'
                
            ))
            ->add('descripcionOficina','textarea',array(
                    'attr'=>array('class'=>'form-control'),
                    'label'=>'Descripción Oficina'
                
            ))
            //->add('usuario')
            ->add('municipio',null,array(
                    'attr'=>array('class'=>'form-control'),
                    'label'=>'Municipio'
                
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proces\OficinasBundle\Entity\Oficinas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_oficinasbundle_oficinas';
    }
}

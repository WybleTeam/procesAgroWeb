<?php

namespace Proces\CursosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CursosVirtualesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCurso',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('descripcionCurso','textarea',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('urlAudio','url',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('urlCurso','url',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('estado',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            //->add('usuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proces\CursosBundle\Entity\CursosVirtuales'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_cursosbundle_cursosvirtuales';
    }
}

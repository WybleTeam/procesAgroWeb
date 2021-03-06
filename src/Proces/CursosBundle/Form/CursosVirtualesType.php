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
                'attr'=>array('class'=>'form-control', 'maxlength'=>'80')
            ))
            ->add('descripcionCurso','textarea',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'400')
            ))
            ->add('urlAudio','url',array(
                'attr'=>array('class'=>'form-control'),
                'required'=>false
            ))
            ->add('urlCurso','url',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'300')
            ))
            ->add('estado','hidden',array(
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

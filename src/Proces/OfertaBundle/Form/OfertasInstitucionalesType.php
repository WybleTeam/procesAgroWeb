<?php

namespace Proces\OfertaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OfertasInstitucionalesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloOferta','text',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'100')
            ))
            ->add('descripcionOferta','textarea',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'400')
            ))
            ->add('urlAudioOferta','url',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'300'),
                'required'=>false
            ))
            ->add('urlOferta','url',array(
                'attr'=>array('class'=>'form-control', 'maxlength'=>'300')
            ))
            //->add('usuario',null,array(
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
            'data_class' => 'Proces\OfertaBundle\Entity\OfertasInstitucionales'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_ofertabundle_ofertasinstitucionales';
    }
}

<?php

namespace Proces\ServiciosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServiciosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloServicio',null,array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('descripcionServicio','textarea',array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('urlAudioServicio','url',array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('urlServicio','url',array(
                'attr'=>array('class'=>'form-control'),
            ))
            //->add('usuario',null,array(
            //    'attr'=>array('class'=>'form-control'),
            //))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proces\ServiciosBundle\Entity\Servicios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_serviciosbundle_servicios';
    }
}

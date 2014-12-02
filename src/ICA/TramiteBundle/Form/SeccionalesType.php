<?php

namespace ICA\TramiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SeccionalesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreSeccional','text',array(
                'attr'=>array('class'=>'form-control'),
            ))
            //->add('estado',null,array(
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
            'data_class' => 'ICA\TramiteBundle\Entity\Seccionales'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ica_tramitebundle_seccionales';
    }
}

<?php

namespace Proces\OficinasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MunicipioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreMunicipio','text',array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('tipoMunicipio','text',array(
                'attr'=>array('class'=>'form-control'),
            ))
            ->add('departamento',null,array(
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
            'data_class' => 'Proces\OficinasBundle\Entity\Municipio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_oficinasbundle_municipio';
    }
}

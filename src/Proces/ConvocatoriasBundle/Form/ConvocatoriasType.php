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
            ->add('descripcion')
            ->add('urlConvocatoria')
            ->add('descripcionLarga')
            ->add('usuario')
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

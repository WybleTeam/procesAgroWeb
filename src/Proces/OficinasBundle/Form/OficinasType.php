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
            ->add('nombreOficina')
            ->add('direccionOficina')
            ->add('descripcionOficina')
            ->add('usuario')
            ->add('municipio')
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

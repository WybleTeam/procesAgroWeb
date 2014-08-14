<?php

namespace Proces\OficinasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartamentoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreDepartamento','text',array(
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
            'data_class' => 'Proces\OficinasBundle\Entity\Departamento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proces_oficinasbundle_departamento';
    }
}

<?php

namespace Web\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Web\WebBundle\Entity\SolicitudCantidadMotivo;

use Doctrine\ORM\EntityRepository;

class SolMantenimientoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('fechaProgramadaIdentificacion','datetime',array(
                'widget'=>'single_text',
                'format' => 'yyyy-MM-dd',
                'required'=>'required'
            ))
            ->add('observacionesRevision','textarea',array(
                'attr'=>array('class'=>'form-control','maxlength'=>'500')
            ))
            ->add('estadoSolicitud','entity',array(
                'class'=>'WebBundle:Estado',
                'query_builder'=>function(EntityRepository $er){
                    return $er->CreateQueryBuilder('u')
                            ->where('u.status = true');
                },
                'attr'=>array('class'=>'form-control'),
                
                'label'=>'Estado de la solicitud'
            ))
         
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\WebBundle\Entity\SolMantenimientoIdentificacion',
            'cascade_validation' => true,
            
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_webbundle_solmantenimiento';
    }
}

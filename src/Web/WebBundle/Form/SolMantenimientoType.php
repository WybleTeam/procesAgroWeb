<?php

namespace Web\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Web\WebBundle\Entity\SolicitudCantidadMotivo;

class SolMantenimientoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('fechaSolicitud',null,array(
            //    'attr'=>array('class'=>'form-control')
            //))
            ->add('justificacionReidentificacion','textarea',array(
                'attr'=>array('class'=>'form-control')
            ))
            //->add('solicitudMantenimientoIdentificacion',null,array(
            //    'attr'=>array('class'=>'form-control')
            //))
            ->add('ica3101',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('nombreFinca',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('nombrePropietarioFinca',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('cedulaPropietarioFinca',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('telefonoFijoPropietario',null,array(
                  'attr'=>array('class'=>'form-control')
            ))
            ->add('telefonoCelularPropietario',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('nombreSolicitante',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('cedulaSolicitante',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('telefonoFijoSolicitante',null,array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('telefonoCelularSolicitante',null,array(
                'attr'=>array('class'=>'form-control')
            ))
             ->add('especieRango', 'collection', array(
                'type' => new EspecieRangoSolicitudType(),
               
                'by_reference'   => false,

            ))    
            ->add('cantidadMotivo', 'collection', array(
                'type'           =>  new SolicitudCantidadMotivoType(),
                'by_reference'   => false,
                
            ))    
            ->add('fechaProgramadaIdentificacion')
            ->add('observacionesRevision','textarea',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('estadoSolicitud','choice',array(
                'choices'=>array(
                    'pendiente'=>'Pendiente',
                    'Aprobado' => 'Aprobado',
                    'Realizado'=> 'Realizado',
                ),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('municipio',null,array(
                'attr'=>array('class'=>'form-control'),
                'empty_value'=>'Escoge un Municipio'
            ))
            ->add('seccional',null,array(
                'attr'=>array('class'=>'form-control'),
                'empty_value'=>'Escoge una Seccional'
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

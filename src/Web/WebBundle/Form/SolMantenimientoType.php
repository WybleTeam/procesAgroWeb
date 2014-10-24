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
            //->add('fechaSolicitud',null,array(
            //    'attr'=>array('class'=>'form-control')
            //))
            ->add('justificacionReidentificacion','textarea',array(
                'attr'=>array('class'=>'form-control', 'readonly'=>'readonly')
            ))
            //->add('solicitudMantenimientoIdentificacion',null,array(
            //    'attr'=>array('class'=>'form-control')
            //))
            ->add('ica3101',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('nombreFinca',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('nombrePropietarioFinca',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('cedulaPropietarioFinca',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('telefonoFijoPropietario',null,array(
                  'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('telefonoCelularPropietario',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('nombreSolicitante',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('cedulaSolicitante',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('telefonoFijoSolicitante',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
            ->add('telefonoCelularSolicitante',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))
             ->add('especieRango', 'collection', array(
                'type' => new EspecieRangoSolType(),
               
                'by_reference'   => false,
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')
            ))    
            ->add('cantidadMotivo', 'collection', array(
                'type'           =>  new SolicitudCantidadMType(),
                'by_reference'   => false,
                'attr'=>array('class'=>'form-control','readonly'=>'readonly')                
            ))    
            ->add('fechaProgramadaIdentificacion',null,array(
                'required'=>'required'
            ))
            ->add('observacionesRevision','textarea',array(
                'attr'=>array('class'=>'form-control')
            ))
            ->add('estadoSolicitud','entity',array(
                'class'=>'WebBundle:Estado',
                'query_builder'=>function(EntityRepository $er){
                    return $er->CreateQueryBuilder('u')
                            ->where('u.status = true');
                },
                'attr'=>array('class'=>'form-control'),
                'empty_value'=>false,
                'label'=>'Estado de la solicitud'
            ))
            //->add('municipio',null,array(
            //    'attr'=>array('class'=>'form-control','readonly'=>'readonly'),
            //    'empty_value'=>'Escoge un Municipio'
                
            //))
            ->add('municipioVereda',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly'),
                'required'=>'required'
            ))  
            ->add('departamento',null,array(
                'attr'=>array('class'=>'form-control','readonly'=>'readonly'),
                'required'=>'required'
            ))    
            //->add('seccional',null,array(
            //    'attr'=>array('class'=>'form-control'),
            //    'empty_value'=>'Escoge una Seccional'
            //))
              
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

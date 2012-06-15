<?php

namespace Metacloud\NimbusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MovimientoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('fecha')
            ->add('n_documento')
            ->add('activo')
            ->add('ccosto')
            ->add('lineas', 'collection', array(
                    'type' => new LineaType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,
                    ))
        ;
    }
    
    public function getDefaultOptions(array $options){
        return array('data_class' => 'Metacloud\NimbusBundle\Entity\Movimiento');
    }

    public function getName()
    {
        return 'metacloud_nimbusbundle_movimientotype';
    }
}

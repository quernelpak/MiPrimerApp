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
        ;
    }

    public function getName()
    {
        return 'metacloud_nimbusbundle_movimientotype';
    }
}

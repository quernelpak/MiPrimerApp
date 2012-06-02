<?php

namespace Metacloud\NimbusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CcostoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('presupuesto')
            ->add('descripcion')
        ;
    }

    public function getName()
    {
        return 'metacloud_nimbusbundle_ccostotype';
    }
}

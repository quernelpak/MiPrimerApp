<?php

namespace Metacloud\NimbusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LineaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('neto')
            ->add('impuesto')
        ;
    }

    public function getName()
    {
        return 'metacloud_nimbusbundle_lineatype';
    }
    
    public function getDefaultOptions(array $options){
        return array('data_class' => 'Metacloud\NimbusBundle\Entity\Linea');
    }
}

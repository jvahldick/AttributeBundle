<?php

namespace Padam87\AttributeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array());
        $builder->add('description', 'textarea', array());
        $builder->add('type', 'choice', array(
            'choices' => array(
                'text'      => 'Text',
                'textarea'  => 'Textarea',
                'choice'    => 'Select',
                'checkbox'  => 'Checkbox',
                'radio'     => 'Radio',
            ),
        ));
        $builder->add('options', 'collection', array(
            'type'          => new OptionType(),
            'allow_add'     => true,
            'allow_delete'  => true,
            'prototype'     => true,
            'by_reference'  => false,
            'options'       => array(),
        ));
        $builder->add('unit', 'text', array(
            'required' => false,
        ));
        $builder->add('required', 'checkbox', array(
            'required' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Padam87\AttributeBundle\Entity\Definition',
        ));
    }

    public function getName()
    {
        return 'definition';
    }
}

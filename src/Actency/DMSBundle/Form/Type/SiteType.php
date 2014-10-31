<?php

// src/Actency/DMSBundle/Form/Type/SiteType.php
namespace Actency\DMSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('url', 'text', array(
        'attr' => array(
          'input_group' => array(
            'prepend' => '.icon-globe'
          ),
          'help_text' => 'Starring with http(s), no ending slash'
        )
      ))
      ->add('secret', 'text', array(
        'attr' => array(
          'input_group' => array(
            'button_append' => array('name' => 'randomize', 'type' => 'button'),
            'prepend' => '.icon-lock'
          ),
          'help_text' => 'Token used to request site information'
        )
      ))
      ->add('actions', 'form_actions', [
        'buttons' => [
            'save' => ['type' => 'submit'],
        ]
    ]);
  }

  public function getName()
  {
    return 'site';
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Actency\DMSBundle\Entity\Site',
    ));
  }
}

?>
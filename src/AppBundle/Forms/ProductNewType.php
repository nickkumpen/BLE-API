<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/03/16
 * Time: 6:52
 */
// src/AppBundle/Forms/ProductNewType.php

namespace AppBundle\Forms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductNewType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class)
            ->add('name', TextType::class)
            ->add('warehouse', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Product'));
    }
}
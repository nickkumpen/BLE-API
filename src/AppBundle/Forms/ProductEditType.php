<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/04/16
 * Time: 14:51
 */
// src/AppBundle/Forms/ProductEditType.php

namespace AppBundle\Forms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


class ProductEditType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Edit Product'));
    }

}
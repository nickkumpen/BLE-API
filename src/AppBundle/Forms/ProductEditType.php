<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/04/16
 * Time: 14:51
 */
// src/AppBundle/Forms/ProductEditType.php

namespace AppBundle\Forms;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Product;

class ProductEditType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $warehousezzz = $options['warehouse'];
        $builder
            ->add('id', TextType::class)
            ->add('warehouses', EntityType::class, array(
                'class'=>'AppBundle\Entity\Product',
                
            ))
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Edit Product'));

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product',
            'warehouse' => null,
        ));
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/03/16
 * Time: 6:52
 */
// src/AppBundle/Forms/ProductNewType.php

namespace AppBundle\Forms;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('warehouse', EntityType::class, array(
                'class'=>'AppBundle\Entity\Warehouse',
                'query_builder'=> function (EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name','ASC');
                },
                'choice_label'=>'name',
                'mapped' => false,

            ))
            ->add('save', SubmitType::class, array('label' => 'Create Product'));
    }
}
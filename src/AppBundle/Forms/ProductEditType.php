<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/04/16
 * Time: 14:51
 */
// src/AppBundle/Forms/ProductEditType.php

namespace AppBundle\Forms;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Product;

class ProductEditType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class)
            ->add('warehouse', EntityType::class, array(
                'class'=>'AppBundle\Entity\Warehouse',
                'query_builder'=> function (EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name','ASC');
                },
                'choice_label'=>'name',
                'mapped' => false,
            
            ))
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Edit Product'));

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product',
        ));
    }

}
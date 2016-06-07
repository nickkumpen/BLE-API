<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 16:23
 */

namespace AppBundle\Forms;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class OrderEditType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('start', DateType::class)
            ->add('end', DateType::class)
            ->add('job', EntityType::class, array(
                'class'=>'AppBundle\Entity\Job',
                'query_builder'=> function (EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name','ASC');
                },
                'choice_label'=>'name',
                'mapped' => false,

            ))
            ->add('warehouse', EntityType::class, array(
                'class'=>'AppBundle\Entity\Warehouse',
                'query_builder'=> function (EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name','ASC');
                },
                'choice_label'=>'name',
                'mapped' => false,

            ))
            ->add('ProductsCollection', EntityType::class, array(
                'class'=>'AppBundle\Entity\Product',
                'query_builder'=> function (EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name','ASC');
                },
                'choice_label'=>'name',
                'mapped' => false,
                'expanded' => true,
                'multiple' => true,

            ))
            ->add('save', SubmitType::class, array('label'=>'Submit Order'));
    }

    public function configureOptions(optionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>'AppBundle\Entity\WorkOrder',));
    }

}
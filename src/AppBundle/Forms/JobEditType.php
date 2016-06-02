<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 13:32
 */

namespace AppBundle\Forms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class JobEditType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
            ->add('start', DateType::class)
            ->add('end', DateType::class)
            ->add('save', SubmitType::class, array('label'=>'Submit Job'));
    }

    public function configureOptions(optionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>'AppBundle\Entity\Job',));
    }

}
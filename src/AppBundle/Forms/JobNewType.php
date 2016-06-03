<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 11:35
 */

namespace AppBundle\Forms;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class JobNewType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
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
            ->add('save', SubmitType::class, array('label'=>'Submit Job'));
    }

}
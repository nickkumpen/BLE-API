<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 1/06/16
 * Time: 10:17
 */

namespace AppBundle\Forms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;
use Symfony\Component\Routing\Tests\Loader\AbstractAnnotationLoaderTest;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', TextType::class)
            ->add('role', ChoiceType::class, array(
                'choices'=>array(
                    'Admin'=>'ROLE_ADMIN',
                    'Moderator'=>'ROLE_MODERATOR',
                    'User'=>'ROLE_USER',
                ),
            ))
            ->add('is_active', ChoiceType::class, array(
                'choices'=>array(
                    'Yes'=> 1,
                    'No'=> 0,
                ),
            ))
            ->add('save', SubmitType::class, array('label' => 'Save User'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }

}
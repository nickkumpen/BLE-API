<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 26/05/16
 * Time: 13:20
 */


namespace AppBundle\Forms;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\Session;



class LoginType extends AbstractType
{
    /**
     * Build the address form.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction('/login_check')
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('remember_me', CheckboxType::class, array('required' => false))
            ->add('save', SubmitType::class, array('label' => 'Log in', 'attr' => array('class' => 'btn btn-primary')));
    }

    /**
     * Get the name.
     * Return null to prevent the form fields from being namespaced.
     *
     * @return null
     */
    public function getName()
    {
        return null;
    }

    /**
     * Configure the options for this form.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' =>'AppBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_csrf_security_token',    
            'intention' => 'authenticate',
        ));

    }
}
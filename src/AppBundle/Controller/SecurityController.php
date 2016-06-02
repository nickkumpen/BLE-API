<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 18/04/16
 * Time: 9:10
 */

// src/AppBundle/Controller/SecurityController.php

namespace AppBundle\Controller;

use AppBundle\Forms\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(LoginType::class);

        return $this->render(
            'forms/login2.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
                'form'         => $form->createView (),

            )
        );
    }
    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        //return $this->redirect($this->generateUrl('product_list'));
    }
}
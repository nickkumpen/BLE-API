<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 18/04/16
 * Time: 9:10
 */

// src/AppBundle/Controller/SecurityController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        
        // Login error
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // Last username entered by user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render(
            'security/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
        
    }

}
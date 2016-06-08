<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 30/05/16
 * Time: 9:08
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AnonymousController extends Controller
{
    /**
     * @Route("/", name="home")
     * 
     */
    public function homeShowAction()
    {
        return $this->render('homepage.html.twig');
    }

}
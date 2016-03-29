<?php

// src/AppBundle/Controller/DefaultController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\camionet1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function listAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll();

        dump($product);
        return $this->render("base.html.twig", array("product" => $product));
    }
}

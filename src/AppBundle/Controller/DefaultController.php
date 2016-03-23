<?php

// src/AppBundle/Controller/DefaultController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\camionet1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/camionet1", name="camionet1list")
     */
    public function listAction()
    {
        $hallow = $this->getDoctrine()
            ->getRepository('AppBundle:camionet1')
            ->findAll();


        dump ($hallow);
        return $this -> render("base.html.twig", array("hallow" => $hallow));
    }
}

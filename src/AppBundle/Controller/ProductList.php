<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/03/16
 * Time: 4:23
 */
// src/Appbundle/Controller/ProductList.php

namespace AppBundle\Controller;
use AppBundle\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductList
{
    /**
     * @Route("/Product")
     */
    public function listAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll();

        dump($product);
        return $this->render("base.html.twig", array("product" => $product));
    }

}
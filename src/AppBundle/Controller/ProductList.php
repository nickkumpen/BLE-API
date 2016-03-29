<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/03/16
 * Time: 4:23
 */
// src/Appbundle/Controller/ProductList.php

namespace AppBundle\Controller;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

class ProductList extends Controller
{
    /**
     * @Route("/productList")
     */
    public function listAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll();

        dump($product);
        return $this->render("base.html.twig", array("product" => $product));
    }

    /**
     * @Route("/productForm")
     */
    public function newAction(Request $request)
    {
        return $this->handleForm($request, new Product(), ProductNewType::class);
    }


    /**
     * @Route("/productForm/{id}")
     */
    public function detailAction(Request $request, $id)
    {
        // create a task and give it some dummy data for this example
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')
        ->find($id);

        if ($product===null)
        {
            throw $this->createNotFoundException();
        }

        return $this->handleForm($request, $product, ProductEditType::class);
    }

    private function handleForm(Request $request, Product $product, $formClass)
    {
        //$form = $this->createFormBuilder($product)
        //    ->add('name',TextType::class)
         //   ->add('save',SubmitType::class, array('label' => 'Create Product'))
         //   ->getForm();
        $form = $this->createForm($formClass, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return new Response('success');
        }
        return $this->render('default/new.html.twig', array('form' => $form->createView(),
        ));

    }

}
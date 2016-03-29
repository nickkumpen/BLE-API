<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/03/16
 * Time: 1:20
 */
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductForm extends Controller
{
    /**
     * @Route("/form")
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $newProduct = new Product();

        $form = $this->createFormBuilder($newProduct)
            ->add('name',TextType::class)
            ->add('save',SubmitType::class, array('label' => 'Create Product'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newProduct);
            $em->flush();
            return new Response('success');
        }
        return $this->render('default/new.html.twig', array('form' => $form->createView(),
            ));
        
    }

}
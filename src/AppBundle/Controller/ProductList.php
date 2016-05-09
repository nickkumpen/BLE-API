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
use AppBundle\Entity\Warehouse;
use AppBundle\Entity\WarehouseProductHistory;
use AppBundle\Entity\WarehouseProductHistoryRepository;
use AppBundle\Forms\ProductNewType;
use AppBundle\Forms\ProductEditType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductList extends Controller
{
    /**
     * @Route("/productlist", name="product_list")
     * @return Response
     */
    public function listAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->createQueryBuilder('p')
            ->select('p, w')
            ->leftJoin('p.warehouses', 'w')
            ->addOrderBy('p.name', 'ASC')
            ->addOrderBy('w.name', 'ASC')
            ->getQuery()
            ->getResult();
        /**
         * @var WarehouseProductHistoryRepository $repo
         */
//        $repo= $this->getDoctrine()->getRepository('AppBundle:WarehouseProductHistory');

        return $this->render("List/Product.html.twig", array(
            "products" => $products,
            "historyRepo" => $this->getDoctrine()->getRepository('AppBundle:WarehouseProductHistory'),
        ));
    }

    /**
     * @Route("/productform", name="product_add")
     */
    public function newAction(Request $request)
    {
        return $this->handleForm($request, new Product(), ProductNewType::class);
    }


    /**
     * @Route("/productform/{id}", name="product_edit")
     */
    public function detailAction(Request $request, $id)
    {
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

        $form = $this->createForm($formClass, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('product_list');
        }
        return $this->render('default/new.html.twig', array('form' => $form->createView(),
        ));

    }  

}
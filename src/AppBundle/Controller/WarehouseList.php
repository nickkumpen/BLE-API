<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 19/04/16
 * Time: 12:28
 */
// src/AppBundle/Controller/ProductList.php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Forms\WarehouseNewType;
use AppBundle\Forms\WarehouseEditType;
use AppBundle\Entity\Warehouse;

class WarehouseList extends Controller
{
    /**
     * @Route("/warehouselist", name="warehouse_list")
     */
    public function listAction()
    {
        $warehouse = $this->getDoctrine()
            ->getRepository('AppBundle:Warehouse')
            ->findAll();
        $count = $warehouse
            ->select('COUNT(Warehouse.products)');
        return $this->render("List/Warehouse.html.twig", array("warehouse"=>$warehouse, "count" =>$count));
    }

    /**
     * @Route("/warehouseform", name="warehouse_add")
     */
    public function newAction(Request $request)
    {
        return $this->handleForm($request, new Warehouse(), WarehouseNewType::class);
    }
    
    /**
     * @Route("/warehouseform/{id}", name="warehouse_edit")
     */
    public function detailAction(Request $request, $id)
    {
        $warehouse = $this->getDoctrine()->getRepository('AppBundle:Warehouse')
            ->find($id);
        
        if($warehouse===null)
        {
            throw $this->createNotFoundException();
        }
        
        return $this->handleForm($request,$warehouse,WarehouseEditType::class);     
    }
    
    private function handleForm(Request $request, Warehouse $warehouse, $formClass)
    {
        $form = $this->createForm($formClass, $warehouse);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form-> isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($warehouse);
            $em->flush();
            return $this->redirectToRoute('warehouse_list');
            
        }
        return $this->render('default/new.html.twig', array('form'=> $form->createView(),));
    }
    
}
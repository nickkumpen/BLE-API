<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 20/04/16
 * Time: 15:58
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use AppBundle\Entity\Warehouse;
use AppBundle\Entity\WarehouseProductHistory;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class InventoryRestController extends FOSRestController
{
    /**
     * @Route("/inventory", name="inventory")
     * 
     */
    public function yourAction(Request $request)
    {
        $params = array();
        $content = $request->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }


       // $newDate = (new DateTime())->format('d/m/Y');

        $updated = new \DateTime("now");

        $em = $this->getDoctrine()->getManager();

        $warehouse = $em->find('AppBundle:Warehouse', $params['Warehouse']);
        foreach ($params['UUID'] as $uuid)
        {
            $product = $em->find('AppBundle:Product', $uuid);

            if ($product === null)
            {
                return $this->redirectToRoute('product_add');
            }

            $warehouseProductHistory = new WarehouseProductHistory();
            $warehouseProductHistory->setTime($updated);
            $warehouseProductHistory->setWarehouse($warehouse);
            $warehouseProductHistory->setProduct($product);
            $warehouseProductHistory->setStrength(8);

            $em->persist($warehouseProductHistory);
            $em->flush();

        }


        $view = $this->view(["params" => $params], 200)
            ->setTemplate("default/temp.html.twig")
            ->setTemplateVar('params');
        return $this->handleView($view);

    }

}
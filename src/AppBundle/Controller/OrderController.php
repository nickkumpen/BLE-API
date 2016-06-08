<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 14:08
 */

namespace AppBundle\Controller;

use AppBundle\Entity\WorkOrder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Forms\OrderNewType;
use AppBundle\Forms\OrderEditType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use AppBundle\Entity\Product;
use AppBundle\Entity\Warehouse;

class OrderController extends Controller
{
    /**
     * @Route("/orderlist", name="order_list")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderListAction()
    {
        $workorders = $this->getDoctrine()
            ->getRepository('AppBundle:WorkOrder')
            ->findAll();
        return $this->render("List/Order.html.twig",array(
            "workorders"=>$workorders
        ));
    }

    /**
     * @Route("/orderinfo/{id}", name="order_info")
     * @Security("has_role('ROLE_USER')")
     */
    public function infoListAction(Request $request, $id)
    {

        $info = $this->getDoctrine()
            ->getRepository('AppBundle:WorkOrder')
            ->find($id);
        return $this->render("List/WorkOrder.html.twig",array(
            "info"=>$info
        ));

    }
    
    /**
     * @Route("/order_add", name="order_add")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderAddAction(Request $request)
    {
        $workorder = new WorkOrder();
        $workorder->setCreated(new \DateTime("now"));
        return $this->handleForm($request, $workorder, OrderNewType::class);
    }

    /**
     * @Route("/order_drop/{id}", name= "order_drop")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderDropAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $workorder = $em->getRepository('AppBundle:WorkOrder')
            ->find($id);
        if($workorder === null)
        {
            throw $this->createNotFoundException();
        }
        $em->remove($workorder);
        $em->flush();
        return $this->redirectToRoute('order_list');

    }

    /**
     * @Route("/orderlist/{id}",name="order_edit")
     * @Security("has_role('ROLE_MODERATOR')")
     */

    public function OrderEditAction(Request $request, $id)
    {
        $workorder = $this->getDoctrine()->getRepository('AppBundle:WorkOrder')->find($id);

        if($workorder === null)
        {
            throw $this->createNotFoundException();
        }
        return $this->handleForm($request, $workorder, OrderEditType::class);
    }

    private function handleForm(Request $request, WorkOrder $workOrder, $formClass)
    {
        $form = $this->createForm($formClass, $workOrder);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            if ($workOrder->getId() && $form->get('job'))
            {
                $workOrder->setJob($form->get('job')->getData());
            }

            if ($workOrder->getId() && $form->get('warehouse'))
            {
                foreach ($form->get('warehouse')->getData() as $warehouse)
                {
                    $workOrder->addWarehouse($warehouse);
                    $warehouse->setWorkOrder($workOrder);
                }

            }
            if ($workOrder->getId() && $form->get('product'))
            {

                foreach ($form->get('product')->getData() as $product)
                {
                    $workOrder->addProduct($product);
                    $product->setWorkOrder($workOrder);
                };
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($workOrder);
            $em->flush();
            return $this->redirectToRoute('order_list');
        }
        return $this->render('forms/Orders.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
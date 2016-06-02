<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 14:08
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Order;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Forms\OrderNewType;
use AppBundle\Forms\OrderEditType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;


class OrderController extends Controller
{
    /**
     * @Route("/orderlist", name="order_list")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderListAction()
    {
        $orders = $this->getDoctrine()
            ->getRepository('AppBundle:Order')
            ->findAll();
        return $this->render("List/Order.html.twig", array(
            "orders"=>$orders
        ));
    }
    
    /**
     * @Route("/order_add", name="order_add")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderAddAction(Request $request)
    {
        $order = new Order();
        $order->setCreated(new \DateTime("now"));
        return $this->handleForm($request, $order, OrderNewType::class);
    }

    /**
     * @Route("/order_drop/{id}", name= "order_drop")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function OrderDropAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $order = $em->getRepository('AppBundle:Order')
            ->find($id);
        if($order === null)
        {
            throw $this->createNotFoundException();
        }
        $em->remove($order);
        $em->flush();
        return $this->redirectToRoute('order_list');

    }

    /**
     * @Route("/orderlist/{id}",name="order_edit")
     * @Security("has_role('ROLE_MODERATOR')")
     */

    public function OrderEditAction(Request $request, $id)
    {
        $order = $this->getDoctrine()->getRepository('AppBundle:Order')->find($id);

        if($order === null)
        {
            throw $this->createNotFoundException();
        }
        return $this->handleForm($request, $order, OrderEditType::class);
    }

    private function handleForm(Request $request, Order $order, $formClass)
    {
        $form = $this->createForm($formClass, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            return $this->redirectToRoute('order_list');
        }
        return $this->render('forms/Order.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
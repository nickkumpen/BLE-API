<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 1/06/16
 * Time: 9:42
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Forms\UserEditType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class UserController extends Controller
{
    /**
     * @Route("/userlist", name="user_list")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function UserListAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();
        return $this->render(":List:Users.html.twig", array(
            "users" => $users
        ));
    }
    
    /**
     * @Route("/userlist/{id}", name="user_edit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function UserEditAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        
        if($user===null)
        {
            throw $this->createNotFoundException();
        }
        
        return $this->handleForm($request, $user, UserEditType::class);
    }
    
    
    private function handleForm(Request $request, User $user, $formClass)
    {
        $form = $this->createForm($formClass, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('user_list');
        }
        return $this->render('List/UsersEdit.html.twig', array(
            'form'=>$form->createView(),
        ));
    }
    
}

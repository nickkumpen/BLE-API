<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 10:14
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Forms\JobNewType;
use AppBundle\Forms\JobEditType;
class JobController extends Controller  
{
    /**
     * @Route("/joblist", name="job_list")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function JobListAction()
    {
        $jobs = $this->getDoctrine()
            ->getRepository('AppBundle:Job')
            ->findAll();
        return $this->render("List/Job.html.twig", array(
            "jobs"=>$jobs
        ));
    }
    
    /**
     * @Route("/job_add", name="job_add")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    public function JobAddAction(Request $request)
    {
        return $this->handleForm($request, new Job(), JobNewType::class);
    }
    
    /**
     * @Route("/joblist/{id}",name="job_edit")
     * @Security("has_role('ROLE_MODERATOR')")
     */
    
    public function JobEditAction(Request $request, $id)
    {
        $job = $this->getDoctrine()->getRepository('AppBundle:Job')->find($id);
        
        if($job === null)
        {
            throw $this->createNotFoundException();
        }
        return $this->handleForm($request, $job, JobEditType::class);
    }
    
    private function handleForm(Request $request, Job $job, $formClass)
    {
        $form = $this->createForm($formClass, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();
            return $this->redirectToRoute('job_list');
        }
        return $this->render('forms/Jobs.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
<?php

namespace MMBundle\Controller;

use AppBundle\Security\AttendanceVoter;
use MMBundle\Form\AttendanceFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MMBundle\Entity\Attendance;
use MMBundle\Form\AttendanceType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

/**
 * Attendance controller.
 *
 * @Route("/attendance")
 */
class AttendanceController extends Controller
{
    /**
     * Lists all Attendance entities.
     *
     * @Route("/", name="attendance_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();



        $formfilter = $this->createForm(new AttendanceFilterType());
        $formfilter->handleRequest($request);

        if ($formfilter->isSubmitted() && $formfilter->isValid()) {
            $attendances = $em->getRepository('MMBundle:Attendance')->filter($formfilter);


            $paginator = $this->get('knp_paginator');

            $attendances = $paginator->paginate(
                $attendances, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10
            );


            return $this->render('attendance/index.html.twig', array(
                'attendances' => $attendances,
                'formfilter' => $formfilter->createView(),
            ));
        }


		$dql   = "SELECT a FROM MMBundle:Attendance a";
		$query = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');			
		
		$attendances = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1)/*page number*/,
			10
		);	
        return $this->render('attendance/index.html.twig', array(
            'attendances' => $attendances,
            'formfilter' => $formfilter->createView(),
        ));
    }

    /**
     * Creates a new Attendance entity.
     *
     * @Route("/new", name="attendance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $attendance = new Attendance();
        $form = $this->createForm(new AttendanceType(), $attendance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $end=$attendance->getGodzinaWyjscia()->getTimestamp();
            $start=$attendance->getGodzinaWejscia()->getTimestamp();
            $attendance->setCzasPracy(($end-$start)/3600);
            $em = $this->getDoctrine()->getManager();
            $em->persist($attendance);
            $em->flush();

            return $this->redirectToRoute('attendance_show', array('id' => $attendance->getId()));
        }

        return $this->render('attendance/new.html.twig', array(
            'attendance' => $attendance,
            'form' => $form->createView(),
        ));
    }

	
/**
     * Creates a new Attendance entity.
     *
     * @Route("/attendanceJson", name="attendanceJson")
     * @Method({"GET"})
     */
    public function printIt(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c.data, c.czasPracy
			FROM MMBundle:Attendance c '
        );
        $eqs = $query->getArrayResult();



        $response = new Response(json_encode($eqs));
        $response->headers->set('Content-Type','application/json');
        $response->headers->set('Access-Control-Allow-Origin','*');
        header('Access-Control-Allow-Origin: *');
        
        return $this->render('attendance/attendanceJson.html.twig', array(
            'json_info' => json_encode($eqs)
        ));
    }
	
    /**
     * Finds and displays a Attendance entity.
     *
     * @Route("/{id}", name="attendance_show")
     * @Method("GET")
     */
    public function showAction(Attendance $attendance)
    {
        $deleteForm = $this->createDeleteForm($attendance);

        return $this->render('attendance/show.html.twig', array(
            'attendance' => $attendance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Attendance entity.
     *
     * @Route("/{id}/edit", name="attendance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Attendance $attendance)
    {

        if(!$this->isGranted(AttendanceVoter::FULLACCES, $attendance)){
            throw new \LogicException('This code should not be reached!');
        }

        $deleteForm = $this->createDeleteForm($attendance);
        $editForm = $this->createForm(new AttendanceType(), $attendance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $end=$attendance->getGodzinaWyjscia()->getTimestamp();
            $start=$attendance->getGodzinaWejscia()->getTimestamp();
            $attendance->setCzasPracy(($end-$start)/3600);
            $em = $this->getDoctrine()->getManager();
            $em->persist($attendance);
            $em->flush();

            return $this->redirectToRoute('attendance_edit', array('id' => $attendance->getId()));
        }

        return $this->render('attendance/edit.html.twig', array(
            'attendance' => $attendance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Attendance entity.
     *
     * @Route("/{id}", name="attendance_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Attendance $attendance)
    {
        $form = $this->createDeleteForm($attendance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($attendance);
            $em->flush();
        }

        return $this->redirectToRoute('attendance_index');
    }

    /**
     * Creates a form to delete a Attendance entity.
     *
     * @param Attendance $attendance The Attendance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Attendance $attendance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attendance_delete', array('id' => $attendance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

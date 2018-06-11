<?php

namespace MMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MMBundle\Entity\Equipment;
use AppBundle\Security\EquipmentVoter;
use MMBundle\Entity\PurchaseInvoice;
use MMBundle\Form\EquipmentType;
use MMBundle\Form\EquipmentSearchType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Symfony\Component\HttpFoundation\Response;

/**
 * Equipment controller.
 *
 * @Route("/equipment")
 */
class EquipmentController extends Controller
{
    /**
     * Lists all Equipment entities.
     *
     * @Route("/", name="equipment_index")
	 * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_PRACOWNIK')) {
            throw new \LogicException('This code should not be reached!');
        }

        $em = $this->getDoctrine()->getManager();


		$form = $this->createForm(new EquipmentSearchType());
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			$equipment = $em->getRepository('MMBundle:Equipment')->search($form);

			return $this->render('equipment/index.html.twig', array(
				'equipment' => $equipment,
				'form' => $form->createView()
			));
		}

		$dql   = "SELECT a FROM MMBundle:Equipment a";
		$query = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');

		$equipment = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1)/*page number*/,
			10
		);

        return $this->render('equipment/index.html.twig', array(
            'equipment' => $equipment,
			'form' => $form->createView()
        ));
    }

    /**
     * Creates a new Equipment entity.
     *
     * @Route("/jsoninfo", name="equipment_jsoninfo")
     * @Method({"GET"})
     */
	public function getExtraInfoInJsonAction(Request $request) {
		
        $em = $this->getDoctrine()->getManager();
		

		$query = $em->createQuery(
			'SELECT c
			FROM MMBundle:Equipment c'
		);
		$categorias = $query->getArrayResult();		
		
		$response = new Response(json_encode($categorias));
		$response->headers->set('Content-Type', 'application/json');
		
		$json_info = "asddsa";
		
        return $this->render('equipment/jsoninfo.html.twig', array(
			'json_info' => $response
        ));
	}
	
    /**
     * Creates a new Equipment entity.
     *
     * @Route("/new", name="equipment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $equipment = new Equipment();
        if(!$this->isGranted(EquipmentVoter::VIEW, $equipment)){
            throw new \LogicException('This code should not be reached!');
        }
        $form = $this->createForm(new EquipmentType(), $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipment);
            $em->flush();

            return $this->redirectToRoute('equipment_show', array('id' => $equipment->getId()));
        }

        return $this->render('equipment/new.html.twig', array(
            'equipment' => $equipment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Equipment entity.
     *
     * @Route("/{id}", name="equipment_show")
     * @Method("GET")
     */
    public function showAction(Equipment $equipment)
    {
        if(!$this->isGranted(EquipmentVoter::VIEW, $equipment)){
            throw new \LogicException('This code should not be reached!');
        }
        $deleteForm = $this->createDeleteForm($equipment);

        return $this->render('equipment/show.html.twig', array(
            'equipment' => $equipment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Equipment entity.
     *
     * @Route("/{id}/edit", name="equipment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipment $equipment)
    {
        if(!$this->isGranted(EquipmentVoter::VIEW, $equipment)){
            throw new \LogicException('This code should not be reached!');
        }
        $deleteForm = $this->createDeleteForm($equipment);
        $editForm = $this->createForm(new EquipmentType(), $equipment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipment);
            $em->flush();

            return $this->redirectToRoute('equipment_edit', array('id' => $equipment->getId()));
        }

        return $this->render('equipment/edit.html.twig', array(
            'equipment' => $equipment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Equipment entity.
     *
     * @Route("/{id}", name="equipment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipment $equipment)
    {
        if(!$this->isGranted(EquipmentVoter::VIEW, $equipment)){
            throw new \LogicException('This code should not be reached!');
        }
        $form = $this->createDeleteForm($equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipment);
            $em->flush();
        }

        return $this->redirectToRoute('equipment_index');
    }

    /**
     * Creates a form to delete a Equipment entity.
     *
     * @param Equipment $equipment The Equipment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipment $equipment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipment_delete', array('id' => $equipment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

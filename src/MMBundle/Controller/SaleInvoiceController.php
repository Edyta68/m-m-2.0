<?php

namespace MMBundle\Controller;

use AppBundle\Security\SaleInvoiceVoter;
use MMBundle\Form\DocumentFilterType;
use MMBundle\Form\SaleInvoiceFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MMBundle\Entity\SaleInvoice;
use MMBundle\Form\SaleInvoiceType;
use MMBundle\Form\SaleInvoiceSearchType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

/**
 * SaleInvoice controller.
 *
 * @Route("/saleinvoice")
 */
class SaleInvoiceController extends Controller
{
    /**
     * Lists all SaleInvoice entities.
     *
     * @Route("/", name="saleinvoice_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_PRACOWNIK')) {
            throw new \LogicException('This code should not be reached!');
        }
        $em = $this->getDoctrine()->getManager();

		
        $form = $this->createForm(new SaleInvoiceSearchType());
		$form->handleRequest($request);

        $formfilter = $this->createForm(new SaleInvoiceFilterType());
        $formfilter->handleRequest($request);


        if($form->isSubmitted()) {

			$saleInvoices = $em->getRepository('MMBundle:SaleInvoice')->search($form);


			return $this->render('saleinvoice/index.html.twig', array(
				'saleInvoices' => $saleInvoices,
                'formfilter' => $formfilter->createView(),
				'form' => $form->createView(),
			));		
		}




        if ($formfilter->isSubmitted() && $formfilter->isValid()) {
            $saleInvoice = $em->getRepository('MMBundle:SaleInvoice')->filter($formfilter);


            $paginator = $this->get('knp_paginator');

            $saleInvoice = $paginator->paginate(
                $saleInvoice, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10
            );


            return $this->render('SaleInvoice/index.html.twig', array(
                'saleInvoices' => $saleInvoice,
                'formfilter' => $formfilter->createView(),
                'form' => $form->createView()
            ));
        }










        
		$dql   = "SELECT a FROM MMBundle:SaleInvoice a";
		$query = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');			
		
		$saleInvoices = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1)/*page number*/,
			10
		);
		
        return $this->render('saleinvoice/index.html.twig', array(
            'saleInvoices' => $saleInvoices,
			'form' => $form->createView(),
            'formfilter' => $formfilter->createView(),
        ));
    }

    /**
     * Creates a new SaleInvoice entity.
     *
     * @Route("/new", name="saleinvoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $SaleInvoice = new SaleInvoice();
        if(!$this->isGranted(SaleInvoiceVoter::VIEW, $SaleInvoice)){
            throw new \LogicException('This code should not be reached!');
        }
        $form = $this->createForm(new SaleInvoiceType(), $SaleInvoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($SaleInvoice);
            $em->flush();

            return $this->redirectToRoute('saleinvoice_show', array('id' => $SaleInvoice->getId()));
        }

        return $this->render('saleinvoice/new.html.twig', array(
            'saleInvoice' => $SaleInvoice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SaleInvoice entity.
     *
     * @Route("/{id}", name="saleinvoice_show")
     * @Method("GET")
     */
    public function showAction(SaleInvoice $saleInvoice)
    {

        $deleteForm = $this->createDeleteForm($saleInvoice);

        return $this->render('saleinvoice/show.html.twig', array(
            'saleInvoice' => $saleInvoice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SaleInvoice entity.
     *
     * @Route("/{id}/edit", name="saleinvoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SaleInvoice $saleInvoice)
    {
        if(!$this->isGranted(SaleInvoiceVoter::VIEW, $saleInvoice)){
            throw new \LogicException('This code should not be reached!');
        }
        $deleteForm = $this->createDeleteForm($saleInvoice);
        $editForm = $this->createForm(new SaleInvoiceType(), $saleInvoice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saleInvoice);
            $em->flush();

            return $this->redirectToRoute('saleinvoice_edit', array('id' => $saleInvoice->getId()));
        }

        return $this->render('saleinvoice/edit.html.twig', array(
            'saleInvoice' => $saleInvoice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SaleInvoice entity.
     *
     * @Route("/{id}", name="saleinvoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SaleInvoice $saleInvoice)
    {

        $form = $this->createDeleteForm($saleInvoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($saleInvoice);
            $em->flush();
        }

        return $this->redirectToRoute('saleinvoice_index');
    }

    /**
     * Creates a form to delete a SaleInvoice entity.
     *
     * @param SaleInvoice $saleInvoice The SaleInvoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SaleInvoice $saleInvoice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('saleinvoice_delete', array('id' => $saleInvoice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

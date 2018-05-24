<?php

namespace MMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MMBundle\Entity\PurchaseInvoice;
use MMBundle\Form\PurchaseInvoiceType;

/**
 * PurchaseInvoice controller.
 *
 * @Route("/purchaseinvoice")
 */
class PurchaseInvoiceController extends Controller
{
    /**
     * Lists all PurchaseInvoice entities.
     *
     * @Route("/", name="purchaseinvoice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $purchaseInvoices = $em->getRepository('MMBundle:PurchaseInvoice')->findAll();

        return $this->render('purchaseinvoice/index.html.twig', array(
            'purchaseInvoices' => $purchaseInvoices,
        ));
    }

    /**
     * Creates a new PurchaseInvoice entity.
     *
     * @Route("/new", name="purchaseinvoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $PurchaseInvoice = new PurchaseInvoice();
        $form = $this->createForm(new PurchaseInvoiceType(), $PurchaseInvoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($PurchaseInvoice);
            $em->flush();

            return $this->redirectToRoute('purchaseinvoice_show', array('id' => $PurchaseInvoice->getId()));
        }

        return $this->render('purchaseinvoice/new.html.twig', array(
            'purchaseInvoice' => $PurchaseInvoice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseInvoice entity.
     *
     * @Route("/{id}", name="purchaseinvoice_show")
     * @Method("GET")
     */
    public function showAction(PurchaseInvoice $purchaseInvoice)
    {
        $deleteForm = $this->createDeleteForm($purchaseInvoice);

        return $this->render('purchaseinvoice/show.html.twig', array(
            'purchaseInvoice' => $purchaseInvoice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PurchaseInvoice entity.
     *
     * @Route("/{id}/edit", name="purchaseinvoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PurchaseInvoice $purchaseInvoice)
    {
        $deleteForm = $this->createDeleteForm($purchaseInvoice);
        $editForm = $this->createForm(new PurchaseInvoiceType(), $purchaseInvoice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchaseInvoice);
            $em->flush();

            return $this->redirectToRoute('purchaseinvoice_edit', array('id' => $purchaseInvoice->getId()));
        }

        return $this->render('purchaseinvoice/edit.html.twig', array(
            'purchaseInvoice' => $purchaseInvoice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseInvoice entity.
     *
     * @Route("/{id}", name="purchaseinvoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PurchaseInvoice $purchaseInvoice)
    {
        $form = $this->createDeleteForm($purchaseInvoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($purchaseInvoice);
            $em->flush();
        }

        return $this->redirectToRoute('purchaseinvoice_index');
    }

    /**
     * Creates a form to delete a PurchaseInvoice entity.
     *
     * @param PurchaseInvoice $purchaseInvoice The PurchaseInvoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PurchaseInvoice $purchaseInvoice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('purchaseinvoice_delete', array('id' => $purchaseInvoice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

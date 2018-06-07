<?php

namespace MMBundle\Controller;

use AppBundle\Security\DocumentVoter;
use MMBundle\Form\DocumentFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MMBundle\Entity\Document;
use MMBundle\Form\DocumentType;
use MMBundle\Form\DocumentSearchType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

/**
 * Document controller.
 *
 * @Route("/document")
 */
class DocumentController extends Controller
{
    /**
     * Lists all Document entities.
     *
     * @Route("/", name="document_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_PRACOWNIK')) {
            throw new \LogicException('This code should not be reached!');
        }

        $em = $this->getDoctrine()->getManager();

		$form = $this->createForm(new DocumentSearchType());
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			$documents = $em->getRepository('MMBundle:Document')->search($form);
		
			return $this->render('document/index.html.twig', array(
				'documents' => $documents,
				'form' => $form->createView()
			));			
		}

        $formfilter = $this->createForm(new DocumentFilterType());
        $formfilter->handleRequest($request);

        if ($formfilter->isSubmitted() && $formfilter->isValid()) {
            $documents = $em->getRepository('MMBundle:Document')->filter($formfilter);


            $paginator = $this->get('knp_paginator');

            $documents = $paginator->paginate(
                $documents, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10
            );


            return $this->render('document/index.html.twig', array(
                'documents' => $documents,
                'formfilter' => $formfilter->createView(),
                'form' => $form->createView()
            ));
        }





		$dql   = "SELECT a FROM MMBundle:Document a";
		$query = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');			
		
		$documents = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1)/*page number*/,
			10
		);		
		
        return $this->render('document/index.html.twig', array(
            'documents' => $documents,
			'form' => $form->createView(),
            'formfilter' => $formfilter->createView()
        ));
    }

    /**
     * Creates a new Document entity.
     *
     * @Route("/new", name="document_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {


        $document = new Document();
        if(!$this->isGranted(DocumentVoter::VIEW, $document)){
            throw new \LogicException('This code should not be reached!');
        }
        $form = $this->createForm(new DocumentType(), $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();

            return $this->redirectToRoute('document_show', array('id' => $document->getId()));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Document entity.
     *
     * @Route("/{id}", name="document_show")
     * @Method("GET")
     */
    public function showAction(Document $document)
    {

        if(!$this->isGranted(DocumentVoter::VIEW, $document)){
            throw new \LogicException('This code should not be reached!');
        }



        $deleteForm = $this->createDeleteForm($document);

        return $this->render('document/show.html.twig', array(
            'document' => $document,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Document entity.
     *
     * @Route("/{id}/edit", name="document_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Document $document)
    {

        if(!$this->isGranted(DocumentVoter::EDIT, $document)){
            throw new \LogicException('This code should not be reached!');
        }

        $deleteForm = $this->createDeleteForm($document);
        $editForm = $this->createForm(new DocumentType(), $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();

            return $this->redirectToRoute('document_edit', array('id' => $document->getId()));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Document entity.
     *
     * @Route("/{id}", name="document_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Document $document)
    {
        $form = $this->createDeleteForm($document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($document);
            $em->flush();
        }

        return $this->redirectToRoute('document_index');
    }

    /**
     * Creates a form to delete a Document entity.
     *
     * @param Document $document The Document entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Document $document)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('document_delete', array('id' => $document->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

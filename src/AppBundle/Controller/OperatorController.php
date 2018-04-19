<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Operator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Operator controller.
 *
 * @Route("operator")
 */
class OperatorController extends Controller
{
    /**
     * Lists all operator entities.
     *
     * @Route("/", name="operator_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operators = $em->getRepository('AppBundle:Operator')->findAll();

        return $this->render('operator/index.html.twig', array(
            'operators' => $operators,
        ));
    }

    /**
     * Creates a new operator entity.
     *
     * @Route("/new", name="operator_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operator = new Operator();
        $form = $this->createForm('AppBundle\Form\OperatorType', $operator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operator);
            $em->flush();

            return $this->redirectToRoute('operator_show', array('id' => $operator->getId()));
        }

        return $this->render('operator/new.html.twig', array(
            'operator' => $operator,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operator entity.
     *
     * @Route("/{id}", name="operator_show")
     * @Method("GET")
     */
    public function showAction(Operator $operator)
    {
        $deleteForm = $this->createDeleteForm($operator);

        return $this->render('operator/show.html.twig', array(
            'operator' => $operator,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operator entity.
     *
     * @Route("/{id}/edit", name="operator_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Operator $operator)
    {
        $deleteForm = $this->createDeleteForm($operator);
        $editForm = $this->createForm('AppBundle\Form\OperatorType', $operator);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operator_edit', array('id' => $operator->getId()));
        }

        return $this->render('operator/edit.html.twig', array(
            'operator' => $operator,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operator entity.
     *
     * @Route("/{id}", name="operator_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Operator $operator)
    {
        $form = $this->createDeleteForm($operator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operator);
            $em->flush();
        }

        return $this->redirectToRoute('operator_index');
    }

    /**
     * Creates a form to delete a operator entity.
     *
     * @param Operator $operator The operator entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Operator $operator)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operator_delete', array('id' => $operator->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

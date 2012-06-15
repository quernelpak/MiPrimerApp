<?php

namespace Metacloud\NimbusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Metacloud\NimbusBundle\Entity\Linea;
use Metacloud\NimbusBundle\Form\LineaType;

/**
 * Linea controller.
 *
 */
class LineaController extends Controller
{
    /**
     * Lists all Linea entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('NimbusBundle:Linea')->findAll();

        return array(
            'entities' => $entities
        );
    }

    /**
     * Finds and displays a Linea entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Linea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Linea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return  array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        );
    }

    /**
     * Displays a form to create a new Linea entity.
     *
     */
    public function newAction()
    {
        $entity = new Linea();
        $form   = $this->createForm(new LineaType(), $entity);

        return  array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Linea entity.
     *
     */
    public function createAction()
    {
        $entity  = new Linea();
        $request = $this->getRequest();
        $form    = $this->createForm(new LineaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('linea_show', array('id' => $entity->getId())));
            
        }

        return $this->render('NimbusBundle:Linea:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Linea entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Linea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Linea entity.');
        }

        $editForm = $this->createForm(new LineaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NimbusBundle:Linea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Linea entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Linea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Linea entity.');
        }

        $editForm   = $this->createForm(new LineaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('linea_edit', array('id' => $id)));
        }

        return $this->render('NimbusBundle:Linea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Linea entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('NimbusBundle:Linea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Linea entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('linea'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

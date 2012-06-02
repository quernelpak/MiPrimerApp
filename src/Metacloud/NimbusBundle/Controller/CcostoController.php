<?php

namespace Metacloud\NimbusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Metacloud\NimbusBundle\Entity\Ccosto;
use Metacloud\NimbusBundle\Form\CcostoType;

/**
 * Ccosto controller.
 *
 * @Route("/ccosto")
 */
class CcostoController extends Controller
{
    /**
     * Lists all Ccosto entities.
     *
     * @Route("/", name="ccosto")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('NimbusBundle:Ccosto')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Ccosto entity.
     *
     * @Route("/{id}/show", name="ccosto_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Ccosto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ccosto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Ccosto entity.
     *
     * @Route("/new", name="ccosto_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ccosto();
        $form   = $this->createForm(new CcostoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Ccosto entity.
     *
     * @Route("/create", name="ccosto_create")
     * @Method("post")
     * @Template("NimbusBundle:Ccosto:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Ccosto();
        $request = $this->getRequest();
        $form    = $this->createForm(new CcostoType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ccosto_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Ccosto entity.
     *
     * @Route("/{id}/edit", name="ccosto_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Ccosto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ccosto entity.');
        }

        $editForm = $this->createForm(new CcostoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Ccosto entity.
     *
     * @Route("/{id}/update", name="ccosto_update")
     * @Method("post")
     * @Template("NimbusBundle:Ccosto:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NimbusBundle:Ccosto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ccosto entity.');
        }

        $editForm   = $this->createForm(new CcostoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ccosto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Ccosto entity.
     *
     * @Route("/{id}/delete", name="ccosto_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('NimbusBundle:Ccosto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ccosto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ccosto'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

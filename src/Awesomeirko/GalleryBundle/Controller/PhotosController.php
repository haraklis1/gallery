<?php

namespace Awesomeirko\GalleryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Awesomeirko\GalleryBundle\Entity\Photos;
use Awesomeirko\GalleryBundle\Form\PhotosType;



/**
 * Photos controller.
 *
 */
class PhotosController extends Controller {

    /**
     * Lists all Photos entities.
     *
     */
    public function indexAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->findBy(array('albumId'=>$id));

        return $this->render('AwesomeirkoGalleryBundle:Photos:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Photos entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Photos();
        $form = $this->createForm(new PhotosType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $entity->upload();

            var_dump($entity);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('photos', array('id' => $entity->getAlbumId())));
        }

        return $this->render('AwesomeirkoGalleryBundle:Photos:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));

    }

    /**
     * Displays a form to create a new Photos entity.
     *
     */
    public function newAction($id) {
        $entity = new Photos();
        $entity->setAlbumId($id);
        $form = $this->createForm(new PhotosType(), $entity);

        return $this->render('AwesomeirkoGalleryBundle:Photos:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'id' => $id
        ));
    }

    /**
     * Finds and displays a Photos entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AwesomeirkoGalleryBundle:Photos:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Photos entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $editForm = $this->createForm(new PhotosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AwesomeirkoGalleryBundle:Photos:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Photos entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PhotosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('photos_edit', array('id' => $id)));
        }

        return $this->render('AwesomeirkoGalleryBundle:Photos:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Photos entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Photos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('photos'));
    }

    /**
     * Creates a form to delete a Photos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}

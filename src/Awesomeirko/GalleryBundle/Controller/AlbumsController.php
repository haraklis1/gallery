<?php

namespace Awesomeirko\GalleryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Awesomeirko\GalleryBundle\Entity\Albums;
use Awesomeirko\GalleryBundle\Form\AlbumsType;

/**
 * Albums controller.
 *
 */
class AlbumsController extends Controller {

    /**
     * Lists all Albums entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->createQuery("SELECT albums, photos.path, photos.imageWidth, photos.imageHeight FROM AwesomeirkoGalleryBundle:Albums albums LEFT JOIN AwesomeirkoGalleryBundle:Photos photos WITH photos.isAlbumCover = 1 AND albums.id = photos.albumId")->getResult();
        return $this->render('AwesomeirkoGalleryBundle:Albums:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Albums entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Albums();
        $form = $this->createForm(new AlbumsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('albums'));
        }

        return $this->render('AwesomeirkoGalleryBundle:Albums:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Albums entity.
     *
     */
    public function newAction() {
        $entity = new Albums();
        $form = $this->createForm(new AlbumsType(), $entity);

        return $this->render('AwesomeirkoGalleryBundle:Albums:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Albums entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Albums')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Albums entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AwesomeirkoGalleryBundle:Albums:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Albums entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Albums')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Albums entity.');
        }

        $editForm = $this->createForm(new AlbumsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AwesomeirkoGalleryBundle:Albums:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Albums entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Albums')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Albums entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AlbumsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('albums_edit', array('id' => $id)));
        }

        return $this->render('AwesomeirkoGalleryBundle:Albums:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Albums entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AwesomeirkoGalleryBundle:Albums')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Albums entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('albums'));
    }

    /**
     * Creates a form to delete a Albums entity by id.
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

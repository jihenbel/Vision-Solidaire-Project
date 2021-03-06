<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evenement;
use AppBundle\Entity\Image;
use function MongoDB\Driver\Monitoring\removeSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Evenement controller.
 *
 * @Route("evenement")
 */

class EvenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/", name="evenement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('AppBundle:Evenement')->findBy(array('isActive'=>true));

        return $this->render('evenement/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="evenement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $evenement->setIsActive(true);
        $form = $this->createForm('AppBundle\Form\EvenementType', $evenement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            if ($_FILES["img"]['name']) {
                $size = sizeof($_FILES['img']['name']);
                for ($i = 0; $i < $size; $i++) {
                    $type = substr($_FILES['img']['type'][$i],6);
                    $_FILES['img']['name'][$i] = uniqid().".".$type;
                    $image = new Image();
                    $image->setEvenement($evenement);
                    $image->setNom( $_FILES['img']['name'][$i]);
                    $em->persist($image);
                    $em->flush();
                }

                $this->upload($_FILES["img"]);

            }

            return $this->redirectToRoute('evenement_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }
    function upload($images)
    {
        $size = sizeof($images['name']);
        for ($i = 0; $i < $size; $i++) {
            $name = $images['name'][$i];
            $path = $this->get('kernel')->getProjectDir()."/web/uploads/images/" . basename($name);
            move_uploaded_file($images['tmp_name'][$i], $path);
        }
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="evenement_show")
     * @Method("GET")
     */
    public function showAction(Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('evenement/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $evenement)
    {
        $editForm = $this->createForm('AppBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Route("/{id}/delete", name="evenement_delete")
     */
    public function deleteAction(Request $request, Evenement $evenement)
    {
        if ($evenement) {
            $evenement->setIsActive(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenement_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

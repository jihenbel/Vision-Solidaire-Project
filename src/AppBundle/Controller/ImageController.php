<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Image controller.
 *
 * @Route("image")
 */
class ImageController extends Controller
{

    /**
     * Deletes a image entity.
     *
     * @Route("/delete/{id}", name="image_delete")
     */
    public function deleteAction(Request $request, Image $image)
    {
            $em=$this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
            return $this->redirectToRoute('evenement_index');
    }
}

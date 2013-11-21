<?php

namespace Awesomeirko\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AwesomeirkoGalleryBundle:Default:index.html.twig', array());
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function indexAction(Request $request)
    {
        $images = [
            'summer-image-1.jpg',
            'summer-image-2.jpg',
            'summer-image-3.jpg',  
            'summer-image-4.jpg',  
        ];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images, /* query NOT result */
            $request->query->getInt('page', 1) /* page number */,
            4 /* limit per page */
        );

        return $this->render('gallery/index.html.twig', [
            'images' => $pagination
        ]);
    }
}

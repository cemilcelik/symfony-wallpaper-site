<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DetailController extends Controller
{
    /**
     * @Route("/detail", name="detail")
     */
    public function indexAction()
    {
        $image = 'image-1.jpg';

        return $this->render('detail/index.html.twig', [
            'image' => $image
        ]);
    }
}

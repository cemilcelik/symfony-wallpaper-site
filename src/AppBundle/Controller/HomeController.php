<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $spring = [
            'spring-image-1.jpg',
            'spring-image-2.jpg',
            'spring-image-3.jpg',
            'spring-image-4.jpg',
        ];
        $winter = [
            'winter-image-1.jpg',
            'winter-image-2.jpg',
            'winter-image-3.jpg',
            'winter-image-4.jpg',
        ];
        $summer = [
            'summer-image-1.jpg',
            'summer-image-2.jpg',
            'summer-image-3.jpg',
            'summer-image-4.jpg',
        ];

        $images = array_merge($spring, $winter, $summer);

        shuffle($images);

        $randomisedImages = array_slice($images, 0, 8);

        dump($randomisedImages);
        
        return $this->render('home/index.html.twig', [
            'randomised_images' => $randomisedImages,
            'winter_images' => array_slice($winter, 0, 2),
            'summer_images' => array_slice($summer, 0, 2),
            'spring_images' => array_slice($spring, 0, 2),
        ]);
    }
}

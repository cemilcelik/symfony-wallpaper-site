<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Wallpaper;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadWallpaperData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $images = [
            'spring-image-1.jpg',
            'spring-image-2.jpg',
            'spring-image-3.jpg',
            'spring-image-4.jpg',
            'winter-image-1.jpg',
            'winter-image-2.jpg',
            'winter-image-3.jpg',
            'winter-image-4.jpg',
            'summer-image-1.jpg',
            'summer-image-2.jpg',
            'summer-image-3.jpg',
            'summer-image-4.jpg',
        ];

        foreach ($images as $value) {
            $wallpaper = (new Wallpaper())
                ->setFilename($value)
                ->setSlug(current(explode('.', $value)))
                ->setHeight(1080)
                ->setWidth(1920)
                ->setCategory(
                    $this->getReference('category.' . current(explode('-', $value)))
                )
            ;
            $manager->persist($wallpaper);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}
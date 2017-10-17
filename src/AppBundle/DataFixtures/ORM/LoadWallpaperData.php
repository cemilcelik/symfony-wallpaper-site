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
        $wallpaper = (new Wallpaper())
            ->setFilename('summer-image-1.jpg')
            ->setSlug('summer-image-1')
            ->setHeight(1080)
            ->setWidth(1920)
            ->setCategory(
                $this->getReference('category.spring')
            )
        ;

        $manager->persist($wallpaper);
        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}
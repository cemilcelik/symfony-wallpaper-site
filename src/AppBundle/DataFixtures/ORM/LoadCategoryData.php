<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            'Summer',
            'Winter',
            'Spring',
        ];
        
        foreach ($categories as $value) {
            $category = (new Category())
                ->setName($value)
            ;
            $this->addReference('category.' . strtolower($value), $category);
            $manager->persist($category);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}

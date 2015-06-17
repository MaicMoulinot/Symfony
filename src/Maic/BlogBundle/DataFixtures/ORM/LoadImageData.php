<?php

namespace Maic\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Maic\BlogBundle\Entity\Image;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoadImageData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        for ($x = 0; $x <= 100; $x++) {
            $image = new Image();
            $image->setId($x);
            $image->setAlt('Marcel et son orchestre' . $x);
            $image->setUrl('marcel.jpg');
            $manager->persist($image);
            $this->addReference(('Image' . $x), $image);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }

}

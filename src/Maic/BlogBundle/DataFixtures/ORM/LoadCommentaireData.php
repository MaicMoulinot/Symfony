<?php

namespace Maic\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Maic\BlogBundle\Entity\Commentaire;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoadCommentaireData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {

        for ($x = 0; $x <= 100; $x++) {
            $commentaire = new Commentaire();
            $commentaire->setId($x);
            $commentaire->setAuteur('Marcel');
            $commentaire->setContenu('Mon orchestre il te déboîte');
            $commentaire->setArticle($this->getReference('Article' . $x));
            $manager->persist($commentaire);
            $this->addReference(('Commentaire' . $x), $commentaire);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 4; // the order in which fixtures will be loaded
    }

}

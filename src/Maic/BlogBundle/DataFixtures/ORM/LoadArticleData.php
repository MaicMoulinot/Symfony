<?php

namespace Maic\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use \Maic\BlogBundle\Entity\Article;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $article = new Article();
        $article->setAuteur('Elle');
        $article->setContenu('Plein de truc');
        $article->setTitre('Titre cool');
        $article->setImage($this->getReference('Categorie'));

        $manager->persist($article);
        $manager->flush();

        $this->addReference('Article', $article);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }

}

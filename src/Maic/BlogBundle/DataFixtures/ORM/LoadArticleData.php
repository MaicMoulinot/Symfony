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
        for ($x = 0; $x <= 100; $x++) {
            $article = new Article();
            $article->setAuteur('Big Brother');
            $article->setContenu('Francis Cabrel is a French singer-songwriter and guitarist. '
                    . 'He has released a number of albums falling mostly within the realm of folk, '
                    . 'with occasional forays into blues or country. Francis Cabrel (born 23 November '
                    . '1953 in Astaffort, France) is a French singer-songwriter and guitarist. He has '
                    . 'released a number of albums falling mostly within the realm of folk, with '
                    . 'occasional forays into blues or country. Several of his songs, such as "L\'encre '
                    . 'de tes yeux," "Petite Marie," and "La corrida," have become enduring favorites '
                    . 'in French music. His first hit song was "Petite Marie,", in 1974; since then '
                    . 'he has sold 21 million albums. The song was about the woman who soon became his wife, '
                    . 'Mariette, with whom he was still married in 2015. An unauthorized biography published '
                    . 'in 2015. Cabrel, who is one of the most private French singers, attempted to have '
                    . 'the book suppressed.');
            $article->setTitre('Francis Cabrel' . $x);
            $article->setImage($this->getReference('Image' . $x));
            $article->setId($x);
            $manager->persist($article);

            $this->addReference(('Article' . $x), $article);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 3; // the order in which fixtures will be loaded
    }

}

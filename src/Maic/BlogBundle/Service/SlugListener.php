<?php

namespace Maic\BlogBundle\Service;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Maic\BlogBundle\Entity\Article;

/*
 * Description of Slug listener.
 */
class SlugListener {

    private $slugger;
    
    public function setSlugger($slugger) {
        $this->slugger = $slugger;
        return $this;
    }
    
    /**
     * Function called just before the update.
     * @param LifecycleEventArgs $args
     * @return type
     */
    public function preUpdate(LifecycleEventArgs $args) {
        return $this->prePersist($args);
    }
    
    /**
     * Function called just before the persist.
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        // peut-être voulez-vous seulement agir sur une entité « Article »
        if ($entity instanceof Article) {
            $slug = $this->slugger->getSlug($entity->getTitre());
            $entity->setSlug($slug);
        }
    }
}

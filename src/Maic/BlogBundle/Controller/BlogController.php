<?php

namespace Maic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maic\BlogBundle\Form\ArticleType;
use Maic\BlogBundle\Form\CommentaireType;
use Maic\BlogBundle\Entity\Article;
use Maic\BlogBundle\Entity\Commentaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Form;

/**
 * @Route("/blog")
 */
class BlogController extends Controller {

    /**
     * Affiche la liste de tous les articles.
     * @param type $page
     * @return type
     * @Template()
     * @Route("/{page}", name="maic_blog_homepage", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function indexAction($page) {     
        $entityManager = $this->getDoctrine()->getManager();
        $articles = $entityManager->getRepository('MaicBlogBundle:Article')->getArticles();

        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        $pagination = $paginator->paginate(
                $articles, $request->query->getInt('page', $page)
                /* page number */, 10/* limit per page */
        );
        return array('pagination' => $pagination);
    }

    /**
     * Affiche un article avec tous ses détails.
     * @param type $article
     * @return type $article
     * @Template()
     * @Route("/article/{id}", name="maic_blog_voir", requirements={"id" = "\d+"}, defaults={"id" = 1})
     * @Route("/article/{slug}", name="maic_blog_voir_slug")
     */
    public function voirAction(Article $article) {
//        $article = $entityManager->getRepository('MaicBlogBundle:Article')->getArticleDetails($article->getId());
        $commentaire = new Commentaire();
        $commentaire->setArticle($article);
        $form = $this->createForm(new CommentaireType(), $commentaire);
        return $this->persist($form, $article, $commentaire);
    }

    /**
     * Modifie un article existant.
     * @param Article $article
     * @return type
     * @Template()
     * @Route("/edit/{id}", name="maic_blog_modifier", requirements={"id" = "\d+"}, defaults={"id" = 1})
     * @Route("/edit/{slug}", name="maic_blog_modifier_slug")
     */
    public function modifierAction(Article $article) {
        $form = $this->createForm(new ArticleType(), $article);
        return $this->persist($form, $article, null);
    }

    /**
     * Crée un nouvel article.
     * @return type
     * @Template()
     * @Route("/add", name="maic_blog_ajouter")
     * @Route("/add", name="maic_blog_ajouter_slug")
     */
    public function ajouterAction() {
        $article = new Article();
        return $this->modifierAction($article);
    }

    /**
     * Fonction de persistance.
     * @param Form $form
     * @param Article $article
     * @param Commentaire $commentaire
     * @return type array ou redirection vers maic_blog_voir.
     */
    private function persist(Form $form, Article $article, Commentaire $commentaire) {
        $isPersisted = false;
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $objectToPersist = ($commentaire == null ? $article : $commentaire);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($objectToPersist);
                $entityManager->flush();
                $isPersisted = true;
            }
        }
        $return = array('article' => $article, 'form' => $form->createView());
        if ($isPersisted) {
            $return = $this->redirectToRoute('maic_blog_voir', array('id' => $article->getId()));
        }
        return $return;
    }

    /**
     * Supprime l'article.
     * @param Article $article
     * @Route("/del/{id}", name="maic_blog_supprimer", requirements={"id" = "\d+"}, defaults={"id" = 1})
     * @Route("/del/{slug}", name="maic_blog_supprimer_slug")
     */
    public function supprimerAction(Article $article) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('maic_blog_homepage', array('page' => '1'));
    }

    /**
     * Affiche les 3 derniers articles publiés par date de création descendante.
     * @return type
     * @Template()
     */
    public function menuAction() {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MaicBlogBundle:Article')->findBy(
                array('publication' => 1), //where
                array('datecreation' => 'desc'), //order by
                3, //limit max
                0); //limit min
        return array('articles' => $articles);
    }

}

<?php

namespace Maic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maic\BlogBundle\Form\ArticleType;
use Maic\BlogBundle\Form\CommentaireType;
use Maic\BlogBundle\Entity\Article;
use Maic\BlogBundle\Entity\Commentaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class BlogController extends Controller {

    /**
     * Affiche la liste de tous les articles.
     * @param type $page
     * @return type
     * @Template()
     * @Route("/{page}", name="maic_blog_homepage", requirements={"id" = "\d+"}, defaults={"id" = 1})
     */
    public function indexAction($page) {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MaicBlogBundle:Article')->getArticles();
        return array('articles' => $articles, 'page' => $page);
    }

    /**
     * Affiche un article avec tous ses détails.
     * @param type $id
     * @return type $article
     * @Template()
     */
    public function voirAction($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $article = $entityManager->getRepository('MaicBlogBundle:Article')->getArticleDetails($id);

        $request = $this->getRequest();
        $commentaire = new Commentaire();
        $form = $this->createForm(new CommentaireType(), $commentaire);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $commentaire->setArticle($article);
                $entityManager->persist($commentaire);
                $entityManager->flush();
                return $this->redirectToRoute('maic_blog_voir', array('id' => $article->getId()));
            }
        }
        return array('article' => $article, 'form' => $form->createView());
    }

    /**
     * Modifie un article existant.
     * @param Article $article
     * @return type
     * @Template()
     */
    public function modifierAction(Article $article) {
        return $this->persistArticle($article);
    }

    /**
     * Crée un nouvel article.
     * @return type
     * @Template()
     */
    public function ajouterAction() {
        $article = new Article();
        return $this->persistArticle($article);
    }

    /**
     * Fonction de persistance d'un article.
     * @param Article $article
     * @return type
     */
    private function persistArticle(Article $article) {
        $isValid = false;
        $form = $this->createForm(new ArticleType(), $article);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // Génération du Slug.
                $slugger = $this->get('maic_blog.slugger');
                $slug = $slugger->getSlug($article->getTitre());
                $article->setSlug($slug);
                
                // Persistance du l'article.
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                $isValid = true;
            }
        }
        $return = array('article' => $article, 'form' => $form->createView());
        if ($isValid) {
            $return = $this->redirectToRoute('maic_blog_voir', array('id' => $article->getId()));
        }
        return $return;
    }
    
    /**
     * Supprime l'article.
     * @param Article $article
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

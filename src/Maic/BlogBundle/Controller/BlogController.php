<?php

namespace Maic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maic\BlogBundle\Form\ArticleType;
use \Maic\BlogBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class BlogController extends Controller {

    /**
     * 
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
     * 
     * @param type $id
     * @return type $article
     * @Template()
     */
    public function voirAction($id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('MaicBlogBundle:Article')->getArticleDetails($id);
        return array('article' => $article);
    }

    /**
     * 
     * @param Article $article
     * @return type
     * @Template()
     */
    public function modifierAction(Article $article) {
        $form = $this->createForm(new ArticleType(), $article);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('maic_blog_voir', array('id' => $article->getId()));
            }
        }
        return array('article' => $article, 'form' => $form->createView());
    }

    /**
     * 
     * @return type
     * @Template()
     */
    public function ajouterAction() {
        $article = new Article();
        $form = $this->createForm(new ArticleType(), $article);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('maic_blog_voir', array('id' => $article->getId()));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * 
     * @param Article $article
     * @Route("/del/{id}", name="maic_blog_supprimer", requirements={"id" = "\d+"})
     */
    public function supprimerAction(Article $article) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        $this->redirectToRoute('maic_blog_homepage', array('page' => '1'));
    }

    /**
     * 
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

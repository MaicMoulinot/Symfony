<?php

namespace Maic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maic\BlogBundle\Form\ArticleType;

class BlogController extends Controller
{
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        //$articles = $em->getRepository('MaicBlogBundle:Article')->findAll();
        $articles = $em->getRepository('MaicBlogBundle:Article')->getArticles();
        return $this->render('MaicBlogBundle:Blog:index.html.twig', array('articles' => $articles, 'page' => $page));
    }
    public function voirAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('MaicBlogBundle:Article')->getArticleDetails($id);
        return $this->render('MaicBlogBundle:Blog:voir.html.twig', array('article' => $article));
    }
    
//    public function modifierAction($id, $titre, $contenu, $auteur)
    public function modifierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$article = $em->getRepository('MaicBlogBundle:Article')->find(12);
        $article = $em->getRepository('MaicBlogBundle:Article')->find($id);
        $categorie = new \Maic\BlogBundle\Entity\Categorie();
        $categorie->setNom('Musique');
        $categorie2 = new \Maic\BlogBundle\Entity\Categorie();
        $categorie2->setNom('Inutile');
        $article->addCategorie($categorie);
        $article->addCategorie($categorie2);
        $em->clear(); //le flush n'exécute rien
        $em->flush(); //pas besoin de persist car l'objet existe déjà en base, le flush suffit

        return $this->redirect($this->generateUrl('maic_blog_voir', array('id' => $article->getId())));
    }
    
    public function ajouterAction()
    {
        $article = new \Maic\BlogBundle\Entity\Article();
        $form = $this->createForm(new \Maic\BlogBundle\Form\ArticleType(), $article);
//        $formBuilder = $this->createFormBuilder($article);
//        $formBuilder->add('titre', 'text')
//                ->add('contenu', 'textarea')
//                ->add('auteur', 'text')
//                ->add('publication', 'checkbox')
//                ->add('datecreation', 'date');
//        $form = $formBuilder->getForm()->createView();
        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                //Faire des trucs
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
            }
        }
        
        return $this->render('MaicBlogBundle:Blog:ajouter.html.twig',array('form'=>$form->createView()));
    }
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MaicBlogBundle:Article')->findBy(
                array('publication'=>1), //where
                array('datecreation'=>'desc'), //order by
                3, //limit max
                0); //limit min
        return $this->render('MaicBlogBundle:Blog:menu.html.twig', array('articles' => $articles));
    }
}

<?php

namespace Maic\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('auteur', null, array('attr' => array(
                    'title' => 'Votre pseudo doit contenir au moins 4 caractères', 
                    'class' => 'text-info')))
                ->add('titre', null, array('attr' => array(
                    'title' => 'Le titre doit contenir au moins 10 caractères', 
                    'class' => 'text-info')))
                ->add('contenu', 'textarea', array('attr' => array('class' => 'textarea')))
//            ->add('image', new ImageType)
                ->add('categories', 'entity', array('class' => 'MaicBlogBundle:Categorie',
                    'property' => 'nom',
                    'multiple' => true,
                    'expanded' => true))
                ->add('datecreation', 'datetime')
                ->add('publication', 'checkbox', array('required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Maic\BlogBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'maic_blogbundle_article';
    }

}

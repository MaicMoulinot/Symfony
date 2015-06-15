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
                ->add('auteur')
                ->add('titre')
                ->add('contenu', 'textarea', array('attr' => array('class' => 'ckeditor')))
//            ->add('image', new ImageType)
                ->add('categories', 'entity', array('class' => 'MaicBlogBundle:Categorie',
                    'property' => 'nom',
                    'multiple' => true,
                    'expanded' => true))
                ->add('datecreation', 'date')
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

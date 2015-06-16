<?php

namespace Maic\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('contenu', 'textarea', array('attr' => array('class' => 'ckeditor')))
                ->add('auteur', null, array('attr' => array(
                    'title' => 'Votre pseudo doit contenir au moins 4 caractères')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Maic\BlogBundle\Entity\Commentaire'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'maic_blogbundle_commentaire';
    }

}

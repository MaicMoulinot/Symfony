<?php

namespace Maic\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="Maic\BlogBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallBacks()
 */
class Article {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     * @Assert\Length(min="10")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     * @Assert\NotBlank()
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation", type="datetime")
     * @Assert\DateTime()
     */
    private $datecreation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;

    /**
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="Maic\BlogBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var Categorie
     *
     * @ORM\ManyToMany(targetEntity="Maic\BlogBundle\Entity\Categorie", cascade={"persist"})
     * @Assert\Valid()
     */
    private $categories;

    /**
     * @var Commentaire
     *
     * @ORM\OneToMany(targetEntity="Maic\BlogBundle\Entity\Commentaire", 
     *      mappedBy="article", 
     *      cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $commentaires;

    /**
     * @var Slug
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->datecreation = new \DateTime();
        $this->publication = true;
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu) {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu() {
        return $this->contenu;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Article
     */
    public function setAuteur($auteur) {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur() {
        return $this->auteur;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Article
     */
    public function setDatecreation($datecreation) {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation() {
        return $this->datecreation;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return Article
     */
    public function setPublication($publication) {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication() {
        return $this->publication;
    }

    /**
     * Set Image
     *
     * @param \Maic\BlogBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(\Maic\BlogBundle\Entity\Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get Image
     *
     * @return \Maic\BlogBundle\Entity\Image 
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Add Categorie
     *
     * @param \Maic\BlogBundle\Entity\Categorie $categorie
     * @return Article
     */
    public function addCategorie(\Maic\BlogBundle\Entity\Categorie $categorie) {
        $this->categories[] = $categorie;

        return $this;
    }

    /**
     * Remove Categorie
     *
     * @param \Maic\BlogBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\Maic\BlogBundle\Entity\Categorie $categorie) {
        $this->categories->removeElement($categorie);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Add categories
     *
     * @param \Maic\BlogBundle\Entity\Categorie $categories
     * @return Article
     */
    public function addCategory(\Maic\BlogBundle\Entity\Categorie $categories) {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Maic\BlogBundle\Entity\Categorie $categories
     */
    public function removeCategory(\Maic\BlogBundle\Entity\Categorie $categories) {
        $this->categories->removeElement($categories);
    }

    /**
     * Add Commentaire
     *
     * @param \Maic\BlogBundle\Entity\Commentaire $commentaire
     * @return Article
     */
    public function addCommentaire(\Maic\BlogBundle\Entity\Commentaire $commentaire) {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove Commentaire
     *
     * @param \Maic\BlogBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\Maic\BlogBundle\Entity\Commentaire $commentaire) {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires() {
        return $this->commentaires;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }
}

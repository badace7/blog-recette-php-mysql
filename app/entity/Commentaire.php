<?php
namespace app\entity;


class Commentaire {
    
    private $id_commentaire;
    private $commentaire;
    private $date_commentaire;
    private $id_utilisateur;
    private $id_recette;

    function __construct($commentaire = '', $id_utilisateur = '', $id_recette = '') {
        $this->id_commentaire = 0;
        $this->commentaire = $commentaire;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_recette = $id_recette;
        $this->date_commentaire = date('d-m-Y à h:i');
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of date_commentaire
     */ 
    public function getDate_commentaire()
    {
        return $this->date_commentaire;
    }

    /**
     * Set the value of date_commentaire
     *
     * @return  self
     */ 
    public function setDate_commentaire($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }

    /**
     * Get the value of id_utilisateur
     */ 
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     *
     * @return  self
     */ 
    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Get the value of id_recette
     */ 
    public function getId_recette()
    {
        return $this->id_recette;
    }

    /**
     * Set the value of id_recette
     *
     * @return  self
     */ 
    public function setId_recette($id_recette)
    {
        $this->id_recette = $id_recette;

        return $this;
    }

    /**
     * Get the value of id_commentaire
     */ 
    public function getId_commentaire()
    {
        return $this->id_commentaire;
    }

    /**
     * Set the value of id_commentaire
     *
     * @return  self
     */ 
    public function setId_commentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;

        return $this;
    }

    /**
     * Get the value of pseudo_utilisateur
     */ 
    public function getPseudo_utilisateur()
    {
        return $this->pseudo_utilisateur;
    }

    /**
     * Set the value of pseudo_utilisateur
     *
     * @return  self
     */ 
    public function setPseudo_utilisateur($pseudo_utilisateur)
    {
        $this->pseudo_utilisateur = $pseudo_utilisateur;

        return $this;
    }
}
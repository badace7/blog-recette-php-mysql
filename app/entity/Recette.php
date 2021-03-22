<?php
namespace app\entity;


class Recette {

    private $id_recette;
    private $titre_recette;
    private $conseil;
    private $temps_preparation;
    private $temps_cuisson;
    private $temps_total;
    private $date_publication;
    private $id_utilisateur;
    private $image_recette;
    private $type_recette;


    function __construct ($titre_recette, $image_recette, $conseil, $temps_preparation, $temps_cuisson, $temps_total, $type_recette) {

        $this->id_recette = 0;
        $this->image_recette = $image_recette;
        $this->titre_recette = $titre_recette;
        $this->conseil = $conseil;
        $this->temps_preparation = $temps_preparation;
        $this->temps_cuisson = $temps_cuisson;
        $this->temps_total = $temps_total;
        $this->type_recette = $type_recette;
        $this->date_publication = date('d-m-Y');

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
     * Get the value of titre_recette
     */ 
    public function getTitre_recette()
    {
        return $this->titre_recette;
    }

    /**
     * Set the value of titre_recette
     *
     * @return  self
     */ 
    public function setTitre_recette($titre_recette)
    {
        $this->titre_recette = $titre_recette;

        return $this;
    }

    /**
     * Get the value of conseil
     */ 
    public function getConseil()
    {
        return $this->conseil;
    }

    /**
     * Set the value of conseil
     *
     * @return  self
     */ 
    public function setConseil($conseil)
    {
        $this->conseil = $conseil;

        return $this;
    }

    /**
     * Get the value of temps_preparation
     */ 
    public function getTemps_preparation()
    {
        return $this->temps_preparation;
    }

    /**
     * Set the value of temps_preparation
     *
     * @return  self
     */ 
    public function setTemps_preparation($temps_preparation)
    {
        $this->temps_preparation = $temps_preparation;

        return $this;
    }

    /**
     * Get the value of temps_cuisson
     */ 
    public function getTemps_cuisson()
    {
        return $this->temps_cuisson;
    }

    /**
     * Set the value of temps_cuisson
     *
     * @return  self
     */ 
    public function setTemps_cuisson($temps_cuisson)
    {
        $this->temps_cuisson = $temps_cuisson;

        return $this;
    }

    /**
     * Get the value of temps_total
     */ 
    public function getTemps_total()
    {
        return $this->temps_total;
    }

    /**
     * Set the value of temps_total
     *
     * @return  self
     */ 
    public function setTemps_total($temps_total)
    {
        $this->temps_total = $temps_total;

        return $this;
    }

    /**
     * Get the value of date_publication
     */ 
    public function getDate_publication()
    {
        return $this->date_publication;
    }

    /**
     * Set the value of date_publication
     *
     * @return  self
     */ 
    public function setDate_publication($date_publication)
    {
        $this->date_publication = $date_publication;

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
     * Get the value of image_recette
     */ 
    public function getImage_recette()
    {
        return $this->image_recette;
    }

    /**
     * Set the value of image_recette
     *
     * @return  self
     */ 
    public function setImage_recette($image_recette)
    {
        $this->image_recette = $image_recette;

        return $this;
    }

    /**
     * Get the value of type_recette
     */ 
    public function getType_recette()
    {
        return $this->type_recette;
    }

    /**
     * Set the value of type_recette
     *
     * @return  self
     */ 
    public function setType_recette($type_recette)
    {
        $this->type_recette = $type_recette;

        return $this;
    }
}
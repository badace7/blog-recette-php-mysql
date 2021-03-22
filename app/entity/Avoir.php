<?php

namespace app\entity;


class Avoir {


    private $id_ustensile;
    private $id_recette;


    function __construct($id_ustensile, $id_recette)
    {
        $this->id_ustensile = $id_ustensile;
        $this->id_recette = $id_recette;
    }


    

    /**
     * Get the value of id_ustensile
     */ 
    public function getId_ustensile()
    {
        return $this->id_ustensile;
    }

    /**
     * Set the value of id_ustensile
     *
     * @return  self
     */ 
    public function setId_ustensile($id_ustensile)
    {
        $this->id_ustensile = $id_ustensile;

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
}
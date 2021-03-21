<?php

namespace app\entity;




class Composer {

    private $id_recette;
    private $id_ingredients;

    function __construct($id_recette, $id_ingredients)
    {
        $this->id_recette = $id_recette;
        $this->id_ingredients = $id_ingredients;
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
     * Get the value of id_ingredients
     */ 
    public function getId_ingredients()
    {
        return $this->id_ingredients;
    }

    /**
     * Set the value of id_ingredients
     *
     * @return  self
     */ 
    public function setId_ingredients($id_ingredients)
    {
        $this->id_ingredients = $id_ingredients;

        return $this;
    }
}